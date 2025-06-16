<?php
function fix_modulo_logo() {
    ob_start(); ?>
    
    <div class="modulo-form" id="form-logo-personalizzato" style="display:none;">
        <h4>Realizzazione del logo</h4>
        <p>Per aiutarti a creare un logo efficace, compila il modulo e ti ricontatteremo al più presto:</p>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="invio_logo">
            <?php wp_nonce_field('logo_nonce_action', 'logo_nonce'); ?>

            <label for="logo_nome_attivita">Nome dell’attività o brand</label>
            <input type="text" name="logo_nome_attivita" required>

            <label for="logo_settore">Settore / ambito</label>
            <input type="text" name="logo_settore">

            <label for="logo_payoff">Payoff / slogan (se presente)</label>
            <input type="text" name="logo_payoff">

            <label for="logo_stile">Hai uno stile preferito? (es. moderno, classico, minimal…)</label>
            <textarea name="logo_stile"></textarea>

            <label for="logo_color">Hai dei colori da usare o evitare?</label>
            <textarea name="logo_color"></textarea>

            <label for="logo_note">Note aggiuntive o riferimenti visivi che ti piacciono</label>
            <textarea name="logo_note"></textarea>

            <button type="submit">Invia richiesta logo</button>
        </form>
    </div>

    <?php
    return ob_get_clean();
}
echo fix_modulo_logo();
