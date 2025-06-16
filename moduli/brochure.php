<?php
function fix_modulo_brochure() {
    ob_start(); ?>
    <div class="modulo-form" id="form-brochure" style="display:none;">
        <h3>Brochure</h3>

        <!-- Info formato consegnato -->
        <p class="formato-info">
            <strong>Formato consegnato:</strong><br>
            A3 orizzontale a 3 ante<br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>

        <!-- Controllo quantità -->
        <div class="quantity-control" data-target="brochure">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="brochure_qty"
                    name="brochure_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Totale modulo -->
        <div class="modulo-prezzo"></div>

        <!-- Contenitore dinamico -->
        <div id="brochure-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="brochure-slide-template">
            <div class="brochure-blocco">
                <h4>Brochure __INDEX__</h4>

                <label for="brochure_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="brochure_descrizione___INDEX__"
                          name="brochure_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. brochure aziendale pieghevole in 2 ante…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-brochure-__INDEX__">
                    <div class="upload-row">
                        <input type="file" name="brochure_upload___INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-brochure-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>


    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_brochure();
