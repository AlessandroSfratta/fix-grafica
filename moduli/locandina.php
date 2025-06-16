<?php
function fix_modulo_locandina() {
    ob_start(); ?>
    <div class="modulo-form" id="form-locandina" style="display:none;">
        <h3>Locandina</h3>

        <!-- Info formato consegnato -->
        <p class="formato-info">
            <strong>Formato consegnato:</strong><br>
            A3 (297×420 mm)<br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>

        <!-- Controllo quantità -->
        <div class="quantity-control" data-target="locandina">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="locandina_qty"
                    name="locandina_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Totale modulo -->
        <div class="modulo-prezzo"></div>

        <!-- Contenitore dinamico -->
        <div id="locandina-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="locandina-slide-template">
            <div class="locandina-blocco">
                <h4>Locandina __INDEX__</h4>

                <label for="locandina_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="locandina_descrizione___INDEX__"
                          name="locandina_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. locandina per evento musicale…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-locandina-__INDEX__">
                    <div class="upload-row">
                        <input type="file" name="upload-locandina-__INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-locandina-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>


    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_locandina();
