<?php
function fix_modulo_manifesto() {
    ob_start(); ?>
    <div class="modulo-form" id="form-manifesto" style="display:none;">
        <h3>Manifesto</h3>

        <p class="formato-info">
            <strong>Formato consegnato:</strong><br>
            <em>La stessa grafica sarà fornita in due formati a tua scelta. Indica i formati desiderati nella descrizione.</em>
        </p>

        <div class="quantity-control" data-target="manifesto">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="manifesto_qty"
                    name="manifesto_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <div class="modulo-prezzo"></div>

        <!-- Contenitore dinamico -->
        <div id="manifesto-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="manifesto-slide-template">
            <div class="manifesto-blocco">
                <h4>Manifesto __INDEX__</h4>

                <label for="manifesto_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="manifesto_descrizione___INDEX__"
                          name="manifesto_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. manifesto evento di quartiere…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-manifesto-__INDEX__">
                    <div class="upload-row">
                        <input type="file" class="fix-upload-input" name="upload-manifesto-__INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-manifesto-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>


    </div>
<?php
    return ob_get_clean();
}
echo fix_modulo_manifesto();
