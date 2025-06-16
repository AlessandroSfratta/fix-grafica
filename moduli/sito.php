<?php
function fix_modulo_sito() {
    ob_start(); ?>
    <div class="modulo-form" id="form-sito" style="display:none;">
        <h3>Contenuti Sito Web</h3>

        <!-- Info formati consegnati -->
        <p class="formato-info">
            <strong>Formati consegnati:</strong><br>
            1. Desktop (1920px)<br>
            2. Tablet (768px)<br>
            3. Mobile (375px)<br>
            <em>Se desideri un formato diverso, puoi indicarlo nella descrizione della grafica.</em>
        </p>


        <!-- Controllo quantità -->
        <div class="quantity-control" data-target="sito">
            <button type="button" class="qty-btn minus">−</button>
            <input  type="number"
                    id="sito_qty"
                    name="sito_qty"
                    class="modulo-quantita"
                    value="1"
                    min="1">
            <button type="button" class="qty-btn plus">+</button>
        </div>

        <!-- Totale modulo -->
        <div class="modulo-prezzo"></div>
        
        <!-- Contenitore dinamico -->
        <div id="sito-slide-container" class="slide-container"></div>

        <!-- Template duplicabile -->
        <script type="text/template" id="sito-slide-template">
            <div class="sito-blocco">
                <h4>Contenuto Sito Web __INDEX__</h4>

                <label for="sito_descrizione___INDEX__">Descrivi la grafica</label>
                <textarea id="sito_descrizione___INDEX__"
                          name="sito_descrizione[__INDEX__]"
                          rows="3"
                          placeholder="Es. banner per homepage con nuova promo…"></textarea>

                <!-- Radio Sì/No -->
                <p>La pagina del sito in cui andrà inserita la grafica esiste già?</p>
                <label>
                    <input type="radio" class="sito-radio" name="sito_url_choice[__INDEX__]" value="si" data-index="__INDEX__"> Sì
                </label>
                <label>
                    <input type="radio" class="sito-radio" name="sito_url_choice[__INDEX__]" value="no" data-index="__INDEX__"> No
                </label>

                <!-- Campo URL se Sì -->
                <div id="sito-url-wrapper-__INDEX__" style="display:none; margin-top: 8px;">
                    <label for="sito_url___INDEX__">Inserisci l’URL della pagina</label>
                    <input type="url" id="sito_url___INDEX__" name="sito_url[__INDEX__]" placeholder="https://...">
                </div>

                <!-- Upload immagini di esempio -->
                <label>Eventuali immagini/foto di esempio:</label>
                <div class="upload-group" id="upload-sito-__INDEX__">
                    <div class="upload-row">
                        <input type="file" class="fix-upload-input" name="sito_upload___INDEX__[]" accept=".jpg,.jpeg,.png,.webp,.pdf">
                    </div>
                </div>
                <button type="button"
                        class="add-upload-btn"
                        data-target="upload-sito-__INDEX__">+ Aggiungi un altro file</button>
            </div>
        </script>


    </div>
    <?php
    return ob_get_clean();
}
echo fix_modulo_sito();
