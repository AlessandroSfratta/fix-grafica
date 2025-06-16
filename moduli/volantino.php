<?php
function fix_modulo_volantino() {
    ob_start(); ?>
    <div class="modulo-form" id="form-volantino" style="display:none;">
        <h3>Volantino</h3>

        <!-- Info formato consegnato -->
        <p class="formato-info">
            <strong>Formato consegnato:</strong><br>
            A5 (148×210 mm)<br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>

        <!-- Controllo quantità -->
        <div class="quantity-control" data-target="volantino">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="volantino_qty"
                    name="volantino_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Totale modulo -->
        <div class="modulo-prezzo"></div>

        <!-- Contenitore dinamico -->
        <div id="volantino-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="volantino-slide-template">
            <div class="volantino-blocco">
                <h4>Volantino __INDEX__</h4>

                <label for="volantino_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="volantino_descrizione___INDEX__"
                          name="volantino_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. volantino con promozione, indirizzo, orari…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-volantino-__INDEX__">
                    <div class="upload-row">
                        <input type="file" name="upload-volantino-__INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-volantino-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>


    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_volantino();
