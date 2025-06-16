<?php
function fix_modulo_whatsapp() {
    ob_start(); ?>
    <div class="modulo-form" id="form-whatsapp" style="display:none;">
        <h3>Contenuti WhatsApp</h3>

        <!-- Info formati consegnati -->
        <p class="formato-info">
            <strong>Formato consegnato:</strong><br>
            1. 4:5 (1080×1350 px)<br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>

        <!-- Controllo quantità -->
        <div class="quantity-control" data-target="whatsapp">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="whatsapp_qty"
                    name="whatsapp_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Totale modulo -->
        <div class="modulo-prezzo"></div>

        <!-- Contenitore dinamico -->
        <div id="whatsapp-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="whatsapp-slide-template">
            <div class="whatsapp-blocco">
                <h4>Contenuto WhatsApp __INDEX__</h4>

                <label for="whatsapp_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="whatsapp_descrizione___INDEX__"
                          name="whatsapp_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. messaggio promozionale per clienti WhatsApp…"></textarea>

                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-whatsapp-__INDEX__">
                    <div class="upload-row">
                        <input type="file" name="whatsapp_upload___INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-whatsapp-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>


    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_whatsapp();
