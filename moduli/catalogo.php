<?php
function fix_modulo_catalogo() {
    ob_start(); ?>
    <div class="modulo-form" id="form-catalogo" style="display:none;">
        <h3>Catalogo</h3>

        <p class="formato-info">
            <strong>Formato consegnato:</strong><br>
            A4 (210×297 mm)<br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>

        <!-- Quantità -->
        <div class="quantity-control" data-target="catalogo">
            <button type="button" class="qty-btn minus">−</button>
            <input type="number" id="catalogo_qty" name="catalogo_qty" class="modulo-quantita" value="1" min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Prezzo totale -->
        <div class="modulo-prezzo"></div>

        <!-- Blocchi dinamici -->
        <div id="catalogo-slide-container" class="slide-container"></div>

        <!-- TEMPLATE duplicabile -->
        <script type="text/template" id="catalogo-slide-template">
            <div class="catalogo-blocco">
                <h4>Catalogo __INDEX__</h4>

                <p><em>Testi e immagini devono essere forniti dal cliente.</em></p>

                <label for="catalogo_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="catalogo_descrizione___INDEX__"
                          name="catalogo_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. catalogo prodotti 2024…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-catalogo-__INDEX__">
                    <div class="upload-row">
                        <input type="file" class="fix-upload-input" name="catalogo_upload___INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-catalogo-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>
    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_catalogo();
