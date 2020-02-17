<div class="header-navbar">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="flex-v flex-v--spaced">
                    <div class="header-logo">
                        <a href="<?php esc_html_e(pll_home_url()); ?>" title="<?php pll_e('Retour vers l\'accueil'); ?>"
                            class="<?php if ($logo_svg): ?>infinitAnimateLogo<?php endif ?>"
                        >
                            <?php if ($logo_svg): ?>
                                <object id="logo-svg" type="image/svg+xml" data="<?php esc_html_e($logo_svg['url']) ?>"></object>
                            <?php endif ?>
                            <img src="<?php esc_html_e($logo['url']); ?>" alt="" />
                        </a>
                    </div>
                    <div class="header-navigation">
                        <?php if ($items): ?>
                            <ul>
                                <?php foreach ($items as $item): ?>
                                    <li>
                                        <a href="<?php esc_html_e(get_the_permalink($item['item']->ID)); ?>">
                                            <?php esc_html_e($item["item"]->post_title); ?>
                                        </a>
                                        <?php if ($item['sub_item_menu']): ?>
                                            <div class="header-navigation__submenu">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <ul>
                                                                <?php $j = 1; ?>
                                                                <?php foreach ($item['sub_item_menu'] as $subItem): ?>
                                                                    <li>
                                                                        <a href="<?php esc_html_e(get_the_permalink($subItem['item']->ID)); ?>">
                                                                            <?php esc_html_e($subItem["item"]->post_title); ?>
                                                                        </a>
                                                                    </li>
                                                                    <?php $j++; ?>
                                                                <?php endforeach ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </li>
                                <?php endforeach; ?>

                                <?php $translations = pll_the_languages(array('raw'=>1, 'hide_if_empty' => 0)); ?>
                                <?php if (count($translations) > 1): ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           role="button" aria-haspopup="true" aria-expanded="false">
                                            <?php echo pll_current_language('slug'); ?> <span
                                                class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php pll_the_languages(array(
                                                'display_names_as' => 'slug',
                                                'hide_if_empty' => 0,
                                                'hide_current' => 1
                                            )); ?>
                                        </ul>
                                    </li>
                                <?php endif ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>