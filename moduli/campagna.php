<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <?php wp_nonce_field('campagna_nonce_action', 'campagna_nonce'); ?>
    <input type="hidden" name="action" value="invio_campagna">

    <label for="campagna_nome">Nome</label>
    <input type="text" id="campagna_nome" name="campagna_nome" required>

    <label for="campagna_email">Email</label>
    <input type="email" id="campagna_email" name="campagna_email" required>

    <label for="campagna_messaggio">Messaggio</label>
    <textarea id="campagna_messaggio" name="campagna_messaggio" rows="4" required></textarea>

    <button type="submit">Invia richiesta</button>
</form>
