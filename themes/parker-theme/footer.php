<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Parker et Parker
 * @since Parker et Parker 1.0
 * @author Philippe BARTOLESCHI - Smart 7
 */
?>

<div class="clearfix"></div>

<!--footer start from here-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php $menus = fol('footer_menu'); ?>
                <?php if ($menus): ?>
                    <div class="row">
                        <?php foreach ($menus[0]['list_1'] as $menu): ?>
                        <div class="col-md-4">
                            <div class="title-menu"><?php esc_html_e($menu['label']); ?></div>

                            <?php if ($menu['menu-footer-items']): ?>
                                <ul class="footer-menu">
                                    <?php foreach ($menu['menu-footer-items'] as $item): ?>
                                    <li>
                                        <a href="<?php echo get_link_url($item['link']) ?>"><?php esc_html_e($item['link']['label']); ?></a>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>
                        </div>
                        <?php endforeach ?>
                        <?php foreach ($menus[0]['list_2'] as $menu): ?>
                        <div class="col-md-4">
                            <div class="title-menu"><?php esc_html_e($menu['label']); ?></div>

                            <ul class="footer-menu">
                                <?php foreach ($menu['menu-footer-items'] as $item): ?>
                                <li>
                                    <a href="<?php echo get_link_url($item['link']) ?>"><?php esc_html_e($item['link']['label']); ?></a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <?php endforeach ?>
                        <?php foreach ($menus[0]['list_3'] as $menu): ?>
                        <div class="col-md-4">
                            <div class="title-menu"><?php esc_html_e($menu['label']); ?></div>

                            <ul class="footer-menu">
                                <?php foreach ($menu['menu-footer-items'] as $item): ?>
                                <li>
                                    <a href="<?php echo get_link_url($item['link']) ?>"><?php esc_html_e($item['link']['label']); ?></a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-title"><?php pll_e('Réseaux sociaux', 'ilio') ?></div>
                        <?php $social = fol('social'); ?>
                        <?php if ($social): ?>
                            <?php foreach ($social as $item): ?>
                                <a class="social-btn" href="<?php echo $item['link']; ?>">
                                    <?php echo $item['image']; ?>
                                </a>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-title"><?php pll_e('Newsletter', 'ilio') ?></div>

                        <?php display_newsletter_form_page(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <ul class="sub-footer-menu">
            <li><a href="#">Mentions légales</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Crédits</a></li>
        </ul>
    </div>
</div>

<div id="notice-cookie" style="display: none;">
    <div id="notice-cookie-content">
        <div class="d-block d-lg-flex align-items-center justify-content-between">
            <div class="mb-3 mb-lg-0">
                <?php pll_e('En poursuivant votre navigation sur ce site, vous acceptez l\'utilisation de cookies afin de réaliser des statistiques de visites'); ?>
            </div>
            <div class="ml-3 ml-lg-0">
                <a href="#" class="btn-rounded" id="agree-cookie">
                    <?php pll_e("J'accepte"); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
