<?php
function fix_modulo_biglietto() {
    ob_start(); ?>
    <div class="modulo-form" id="form-biglietto" style="display:none;">
        <h3>Biglietto da visita</h3>

        <!-- Info formato consegnato -->
        <p class="formato-info">
            <strong>Formato consegnato:</strong><br>
            85×55 mm<br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>

        <!-- Controllo quantità -->
        <div class="quantity-control" data-target="biglietto">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="biglietto_qty"
                    name="biglietto_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Totale modulo -->
        <div class="modulo-prezzo"></div>

        <!-- Contenitore dinamico -->
        <div id="biglietto-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="biglietto-slide-template">
            <div class="biglietto-blocco">
                <h4>Biglietto da visita __INDEX__</h4>

                <label for="biglietto_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="biglietto_descrizione___INDEX__"
                          name="biglietto_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. biglietto con logo e contatti fronte/retro…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-biglietto-__INDEX__">
                    <div class="upload-row">
                        <input type="file" class="fix-upload-input" name="upload-biglietto-__INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-biglietto-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>


    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_biglietto();
