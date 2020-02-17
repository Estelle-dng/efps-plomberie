<form id="nForm" method="post" class="">
    <input name="email" placeholder="<?php pll_e("exemple@hotmail.com") ?>" class="nInput" type="email" class="round" required />
    <button class="nl_submit" type="submit">
        <i class="fa fa-angle-right" aria-hidden="true"></i>

    </button>

    <?php wp_nonce_field('subscribe_newsletter', 'subscribe_newsletter_nonce'); ?>
</form>
