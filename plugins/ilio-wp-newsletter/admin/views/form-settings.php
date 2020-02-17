<div id="theme-options-wrap">
    <div class="icon32" id="icon-tools">
        <br />
    </div>
    <h2>Newsletter Options</h2>
    <p>Multiples (not so many) options for newsletter plugin</p>
    <form method="post" action="">
        <p class="submit">
            <input type="hidden" name="newsletter-email" value="0" />
            <input type="checkbox" name="newsletter-email" value="1" <?php if ($newsletter_email) { echo 'checked'; } ?>> <?php _e('Send e-mail to admin on new submition'); ?><br>
        </p>
        <p>
            <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
        </p>
    </form>
</div>