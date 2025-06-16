<?php
function fix_modulo_rollup() {
    ob_start(); ?>
    <div class="modulo-form" id="form-rollup" style="display:none;">
        <h3>Roll-up</h3>

        <!-- Info formato consegnato -->
        <p class="formato-info">
            <strong>Formato consegnato:</strong><br>
            85×200 cm<br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>

        <!-- Controllo quantità -->
        <div class="quantity-control" data-target="rollup">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="rollup_qty"
                    name="rollup_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Totale modulo -->
        <div class="modulo-prezzo"></div>

        <!-- Contenitore dinamico -->
        <div id="rollup-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="rollup-slide-template">
            <div class="rollup-blocco">
                <h4>Roll-up __INDEX__</h4>

                <label for="rollup_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="rollup_descrizione___INDEX__"
                          name="rollup_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. roll-up fiera aziendale…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-rollup-__INDEX__">
                    <div class="upload-row">
                        <input type="file" class="fix-upload-input" name="rollup_upload___INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-rollup-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>


    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_rollup();
