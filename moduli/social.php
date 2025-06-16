<?php
function fix_modulo_social() {
    ob_start(); ?>
    <div class="modulo-form" id="form-social" style="display:none;">
        <h3>Contenuti Social</h3>

        <!-- Info formati consegnati -->
        <p class="formato-info">
            <strong>Formati consegnati:</strong><br>
            1. 1:1 (1080×1080 px) <br>
            2. 4:5 (1080×1350 px) <br>
            3. 9:16 (1080×1920 px) <br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>

        <!-- Controllo quantità -->
        <div class="quantity-control" data-target="social">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="social_qty"
                    name="social_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Totale modulo -->
        <div class="modulo-prezzo"></div>
        
        <!-- Contenitore dinamico -->
        <div id="social-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="social-slide-template">
            <div class="social-blocco">
                <h4>Contenuto Social __INDEX__</h4>

                <label for="social_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="social_descrizione___INDEX__"
                          name="social_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. grafica promozione estiva…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-social-__INDEX__">
                    <div class="upload-row">
                        <input type="file" class="fix-upload-input" name="social_upload___INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-social-__INDEX__">+ Aggiungi un altro file</button>

            </div>
        </script>


    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_social();
