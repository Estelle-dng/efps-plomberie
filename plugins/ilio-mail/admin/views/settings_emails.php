<?php if (!defined('ILIO_MAIL_VERSION')) exit; ?>

<?php $o = get_option('ilio_settings_emails'); ?>

<div class="wrap no_move lcwp_form">
    <h1 class="wp-heading-inline">
        Gestion des emails
    </h1>

    <div id="tabs">
        <form method="post" class="form-wrap ilio-form-validate ilio-form-fields" action="">
            <div id="main_opt" style="margin-bottom: 30px;">
                <h3><?php _e("Informations Expéditeur", 'lilio'); ?></h3>
                <?php
                $fromName = get_option('ilio_email_settings_name') ?: get_bloginfo('name');
                $fromEmail = get_option('ilio_email_settings_email') ?: get_bloginfo('admin_email');
                ?>
                <table class="widefat pg_table">
                    <tr>
                        <td class="pg_label_td">
                            <label for="ilio_email_settings_name"><?php _e("Nom d'envoi", 'lilio'); ?></label>
                        </td>
                        <td class="pg_field_td">
                            <input type="text" name="ilio_email_settings[name]" value="<?php echo $fromName; ?>" class="required" id="ilio_email_settings_name" />
                        </td>
                        <td><span class="info"><?php _e('Le nom visible dans le champ "De" de l\'email', 'lilio'); ?></span></td>
                    </tr>

                    <tr>
                        <td class="pg_label_td">
                            <label for="ilio_email_settings_email"><?php _e("Email d'envoi", 'lilio'); ?></label>
                        </td>
                        <td class="pg_field_td">
                            <input type="text" name="ilio_email_settings[email]" value="<?php echo $fromEmail; ?>" class="required validate-email" id="ilio_email_settings_email" />
                        </td>
                        <td><span class="info"><?php _e('L\'email visible dans le champ "De" de l\'email', 'lilio'); ?></span></td>
                    </tr>

                </table>
            </div>

            <input type="submit" name="ilio_email_submit" value="<?php _e('Enregistrer les réglages', 'lilio') ?>" class="button-primary" />
        </form>
    </div>
</div>
