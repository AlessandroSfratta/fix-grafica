<?php

/**

 * Plugin Name: Fix Grafica

 * Description: Plugin per configurare grafiche personalizzate nei prodotti.

 * Version: 2.0

 * Author: Fix Agency

 */



if ( ! defined( 'ABSPATH' ) ) exit;




// functions.php  (o dentro al plugin, subito dopo wp_enqueue_script)
add_action( 'wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'fix-grafica-style',
        plugin_dir_url( __FILE__ ) . 'style.css'
    );

    wp_enqueue_script(
        'fix-grafica-js',
        plugin_dir_url( __FILE__ ) . 'fix-grafica.js',
        ['jquery'],
        null,
        true // ✅ Carica nel footer
    );

    // ✅ Passaggio di variabili JS per l'AJAX
    wp_localize_script( 'fix-grafica-js', 'fix_upload', [
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'fix_upload_nonce' ),
    ]);

});


// Shortcode principale

add_shortcode('fix_grafica', function($atts) {

    $atts = shortcode_atts(['product_id' => 6232], $atts);

    echo "<script>window.fixGraficaProductId = {$atts['product_id']};</script>";



    ob_start(); ?>

    <div id="fix-grafica-form" class="fix-grafica-wrapper">

        <!-- STEP 1 -->

        <div class="fix-step step-1" data-step="1">

            <div class="fix-step-header">

                <img src="https://fixagency.it/wp-content/uploads/2025/06/logo-step-1-1.png" alt="Logo step 1" class="fix-step-logo" />

                <div>

                    <span class="titleStep"><strong>Step 1</strong> – Hai già un logo?</span>

                    <p>Prima di iniziare, abbiamo bisogno di sapere se hai già un logo: questo ci aiuterà a capire meglio di cosa hai bisogno e a realizzare un lavoro personalizzato, senza lasciare nulla al caso.</p>

                </div>

            </div>



            <div class="fix-step-options">

                <div class="fix-option" data-price="0" data-type="logo" data-value="si">

                    <div class="flexCont">

                        <span class="scelta">si</span>

                        <button type="button" class="fix-upload-btn">allega file <i class="ri-upload-line"></i></button>

                        <input type="file" class="fix-upload-input" accept=".pdf,.jpeg,.jpg,.png" style="display:none;">

                    </div>

                    <img src="https://fixagency.it/wp-content/uploads/2025/06/si.png" alt="Hai già un logo" />

                    <small>Formati accettati: pdf, jpeg, jpg o png</small>

                </div>



                <div class="fix-option" data-price="0" data-type="logo" data-value="voglio-realizzarlo">

                    <div class="flexCont">

                        <span class="scelta">voglio realizzarlo</span>

                    </div>

                    <img src="https://fixagency.it/wp-content/uploads/2025/06/no-voglioc-rearlo-1.png" alt="Voglio realizzarlo" />

                    <small>Ti farò domande specifiche<br>nei prossimi step</small>

                </div>



                <div class="fix-option" data-price="0" data-type="logo" data-value="non-necessario">

                    <div class="flexCont">

                        <span class="scelta">non è necessario <span title="Ne sei proprio sicuro/a?"><i class="ri-information-2-line"></i></span></span>

                    </div>

                    <img src="https://fixagency.it/wp-content/uploads/2025/06/no-non-e-necessario.png" alt="Non necessario" />

                    <small>Per il lavoro che hai in mente<br>non occorre utilizzare il logo</small>

                </div>

            </div>

<!-- Modulo logo personalizzato (mostrato solo allo step 3 se serve) -->

<?php include plugin_dir_path(__FILE__) . 'moduli/logo.php'; ?>



        </div>



        <!-- STEP 2 -->

        <div class="fix-step" data-step="2">

            <span class="titleStep">Step 2 – Qual è il tuo obiettivo comunicativo?</span>

            <div class="flexCont2">

                <div class="fix-option" data-price="0"><i class="ri-megaphone-line"></i>Comunicare un messaggio<br><small>Diffondere offerte, novità, avvisi o messaggi urgenti rivolti al pubblico</small></div>

                <div class="fix-option" data-price="0"><i class="ri-artboard-line"></i>Presentazione del brand<br><small>Far conoscere l’azienda, presentare servizi e prodotti, mostrare professionalità e valori</small></div>

                <div class="fix-option" data-price="0"><i class="ri-medal-2-line"></i>Promuovere un evento<br><small>Grafiche pensate per promuovere la partecipazione a un evento</small></div>

            </div>

        </div>



        <!-- STEP 3 -->

        <div class="fix-step" data-step="3">

            <span class="titleStep">Step 3 – Come intendi diffondere la grafica?</span>

            <div class="flexCont3">

                <div class="fix-group">

                    <h4><i class="ri-cloud-line"></i> Online</h4>

                    <div class="canale-checkbox-wrapper">

                        <label><input type="checkbox" class="canale-checkbox" value="social" data-target="form-social"> Social</label>

                        <label><input type="checkbox" class="canale-checkbox" value="sito web" data-target="form-sito"> Sito web</label>

                        <label><input type="checkbox" class="canale-checkbox" value="whatsapp" data-target="form-whatsapp"> WhatsApp</label>

                    </div>

                </div>

                <div class="fix-group">

                    <h4><i class="ri-printer-line"></i> Offline</h4>

                    <div class="canale-checkbox-wrapper">

                        <label><input type="checkbox" class="canale-checkbox" value="biglietto da visita" data-target="form-biglietto"> Biglietto da visita</label>

                        <label><input type="checkbox" class="canale-checkbox" value="volantini" data-target="form-volantino"> Volantino</label>

                        <label><input type="checkbox" class="canale-checkbox" value="locandine" data-target="form-locandina"> Locandina</label>

                        <label><input type="checkbox" class="canale-checkbox" value="manifesti" data-target="form-manifesto"> Manifesto</label>

                        <label><input type="checkbox" class="canale-checkbox" value="rollup" data-target="form-rollup"> Roll-up</label>

                        <label><input type="checkbox" class="canale-checkbox" value="catalogo" data-target="form-catalogo"> Catalogo</label>

                        <label><input type="checkbox" class="canale-checkbox" value="brochure" data-target="form-brochure"> Brochure</label>

                   </div> 

                </div>





                <div class="fix-group">

                    <h4><i class="ri-advertisement-line"></i> Campagna personalizzata</h4>

                    <label><input type="checkbox" id="checkbox-parlare"> Voglio parlare con qualcuno</label>

                </div>





            </div>

        <!-- MODULI DINAMICI -->

        <div id="moduli-canali">

            <?php

                foreach ([

                    'social', 'sito', 'whatsapp',

                    'biglietto', 'volantino', 'locandina',

                    'manifesti', 'rollup', 'catalogo', 'brochure'

                ] as $modulo) {

                    $path = plugin_dir_path(__FILE__) . 'moduli/' . $modulo . '.php';

                    if (file_exists($path)) include $path;

                }

            ?>



            <!-- Inserisci qui direttamente il modulo personalizzato -->

            <div id="form-parlare" class="modulo-form" style="display:none;">

                <h3>Campagna personalizzata</h3>

                <p>Hai bisogno di qualcosa di più complesso? Raccontaci la tua idea, ti ricontattiamo subito!</p>



                <div class="form-contatto" style="display:none;">

                    <?php include plugin_dir_path(__FILE__) . 'moduli/campagna.php'; ?>

                </div>

            </div>

        </div>

            <div id="fix-logo-preview" class="fix-logo-preview" style="display:none;"></div>









        </div>











        <div class="fix-step-nav">

            <button class="fix-prev-btn" style="display:none;">Indietro</button>

            <button class="fix-next-btn">Avanti</button>

        </div>



        <div id="fix-investimento" class="fix-investimento"></div>

    </div>

<?php return ob_get_clean(); });








add_action('admin_post_nopriv_invio_campagna', 'gestione_invio_campagna');

add_action('admin_post_invio_campagna', 'gestione_invio_campagna');



function gestione_invio_campagna() {

    if (!isset($_POST['campagna_nonce']) || !wp_verify_nonce($_POST['campagna_nonce'], 'campagna_nonce_action')) {

        wp_die('Errore di sicurezza');

    }



    $nome = sanitize_text_field($_POST['campagna_nome']);

    $email = sanitize_email($_POST['campagna_email']);

    $messaggio = sanitize_textarea_field($_POST['campagna_messaggio']);



    $to = 'info@fixagency.it';

    $subject = 'Nuova richiesta campagna personalizzata';

    $body = "Nome: $nome\nEmail: $email\nMessaggio:\n$messaggio";

    $headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: $nome <$email>"];



    wp_mail($to, $subject, $body, $headers);



    wp_redirect(home_url('/grazie-per-la-richiesta/'));

    exit;

}



/* ------------------------------------------------------------------
 * WooCommerce – integrazione “Fix Grafica”
 * ------------------------------------------------------------------ */

/** 1. Salva tutti i campi del configuratore nel carrello */
add_filter( 'woocommerce_add_cart_item_data', function ( $cart_item_data, $product_id, $variation_id ) {
    if ( $product_id == 6232 && isset( $_GET['fix_grafica_data'] ) ) {

        parse_str( sanitize_text_field( $_GET['fix_grafica_data'] ), $form_data );

        // Cast corretto
        if ( isset( $form_data['prezzo_personalizzato'] ) ) {
            $form_data['prezzo_personalizzato'] = floatval( $form_data['prezzo_personalizzato'] );
        }

        $cart_item_data['fix_grafica'] = $form_data;
    }
    return $cart_item_data;
}, 10, 3 );




/** 2. Imposta il prezzo personalizzato in carrello / checkout */
add_action( 'woocommerce_before_calculate_totals', function ( $cart ) {

    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return;
    }

    foreach ( $cart->get_cart() as $item ) {
        if ( isset( $item['fix_grafica']['prezzo_personalizzato'] ) ) {
            $item['data']->set_price( $item['fix_grafica']['prezzo_personalizzato'] );
        }
    }
} );


function etichetta_readable($key) {
    $map = [
        'logo' => 'Hai già un logo?',
        'obiettivo' => 'Obiettivo comunicativo',
        'canale' => 'Canali scelti',
    ];

    if (isset($map[$key])) return $map[$key];

    // biglietto_qty → Quantità Biglietti
    if (preg_match('/^([a-z]+)_qty$/', $key, $m)) {
        return 'Quantità ' . ucfirst($m[1]);
    }

    // upload-biglietto-1 → File caricato
    if (preg_match('/^upload\-[a-z]+\-?\d*/i', $key)) {
        return 'File caricato';
    }

    // social_descrizione1 → Descrizione
    if (preg_match('/_descrizione\d*/i', $key)) {
        return 'Descrizione';
    }

    return ucwords(str_replace('_', ' ', $key));
}

/** 3. Mostra i metadati in carrello e checkout */
add_filter('woocommerce_get_item_data', function ($item_data, $cart_item) {
    if (!empty($cart_item['fix_grafica'])) {
        foreach ($cart_item['fix_grafica'] as $key => $value) {
            if ($key === 'prezzo_personalizzato' || $value === '') continue;

            $etichetta = etichetta_readable($key);
            $valPulito = preg_replace('/^C:\\\\fakepath\\\\/i', '', $value);

            $item_data[] = [
                'name'  => $etichetta,
                'value' => esc_html($valPulito),
            ];
        }
    }
    return $item_data;
}, 10, 2);




/** 4. Copia i metadati nell’ordine (backend + e‑mail) */
add_action('woocommerce_add_order_item_meta', function ($item_id, $values) {
    if (!empty($values['fix_grafica'])) {
        foreach ($values['fix_grafica'] as $key => $value) {
            if ($key === 'prezzo_personalizzato' || $value === '') continue;

            $etichetta = etichetta_readable($key);
            $valPulito = preg_replace('/^C:\\\\fakepath\\\\/i', '', $value);

            // Se è un file, crea link fittizio al file (es. in /wp-content/uploads/)
            if (preg_match('/\.(jpg|jpeg|png|pdf|webp)$/i', $valPulito)) {
                $valLinkato = home_url('/wp-content/uploads/' . $valPulito);
                $valFinale = '<a href="' . esc_url($valLinkato) . '" target="_blank">' . esc_html($valPulito) . '</a>';
                wc_add_order_item_meta($item_id, $etichetta, $valFinale, true);
            } else {
                wc_add_order_item_meta($item_id, $etichetta, esc_html($valPulito), true);
            }

        }
    }
}, 10, 2);


add_action( 'wp_ajax_fix_upload_logo',        'fix_upload_logo' );
add_action( 'wp_ajax_nopriv_fix_upload_logo', 'fix_upload_logo' );
add_action( 'wp_ajax_fix_upload_file',        'fix_upload_file' );
add_action( 'wp_ajax_nopriv_fix_upload_file', 'fix_upload_file' );

function fix_upload_logo() {

    check_ajax_referer( 'fix_upload_nonce', 'nonce' );

    if ( empty( $_FILES['upload_file'] ) ) {
        error_log( 'File non ricevuto' );
    }

    // 2a. Directory personalizzata “/fix-grafica/anno/mese”
    add_filter( 'upload_dir', 'fix_custom_upload_dir' );

    // 2b. Salvo nel Media Library
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $attach_id = media_handle_upload( 'upload_file', 0 );   // 0 = nessun post

    remove_filter( 'upload_dir', 'fix_custom_upload_dir' );

    error_log('[FixUpload] Attachment ID: ' . $attach_id);


    if ( is_wp_error( $attach_id ) ) {
        wp_send_json_error( $attach_id->get_error_message() );
    }

    wp_send_json_success( [
        'id'  => $attach_id,
        'url' => wp_get_attachment_url( $attach_id ),
    ] );

}

function fix_upload_file() {
    check_ajax_referer( 'fix_upload_nonce', 'nonce' );

    if ( empty( $_FILES['upload_file'] ) ) {
        error_log( 'File non ricevuto' );
    }

    add_filter( 'upload_dir', 'fix_custom_upload_dir' );

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $attach_id = media_handle_upload( 'upload_file', 0 );

    remove_filter( 'upload_dir', 'fix_custom_upload_dir' );

    if ( is_wp_error( $attach_id ) ) {
        wp_send_json_error( $attach_id->get_error_message() );
    }

    wp_send_json_success( [
        'id'  => $attach_id,
        'url' => wp_get_attachment_url( $attach_id ),
    ] );
}

function fix_custom_upload_dir( $dirs ) {
    $dirs['subdir'] = '/fix-grafica/' . date('Y') . '/' . date('m');
    $dirs['path']   = $dirs['basedir'] . $dirs['subdir'];
    $dirs['url']    = $dirs['baseurl'] . $dirs['subdir'];
    return $dirs;
}




add_filter('woocommerce_order_item_display_meta_value', function($value, $meta, $item) {
    if (strpos($value, '<a ') !== false) return $value;
    return wp_kses_post($value);
}, 10, 3);




