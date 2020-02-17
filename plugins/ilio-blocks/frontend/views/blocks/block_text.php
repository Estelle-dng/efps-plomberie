<div class="container block-text">
    <div class="row">
        <?php if ($block["img"]): ?>
            <div class="col-md-6 <?php echo ($block["img_position"] == 'right') ? 'col-md-push-6' : '' ?>">
                <img class="img-responsive" src="<?php esc_html_e($block["img"]["url"]) ?>">
            </div>
        <?php endif; ?>

        <?php $subtitleBorder = false; ?>

        <?php if ($block["img"]): ?>
            <?php $subtitleBorder = true; ?>
            <?php $classes = "col-md-6"; ?>
            <?php if ($block["img_position"] == 'right'): ?>
                <?php $classes .= " col-md-pull-6"; ?>
            <?php endif ?>
        <?php else: ?>
            <?php $classes = "col-md-12 text-center"; ?>
        <?php endif ?>

        <div class="<?php echo $classes; ?>">
            <div class="block-text__content">
                <h2 class="title">
                    <?php esc_html_e($block["title"]); ?>
                </h2>

                <h3 class="subtitle mb--40 <?php echo $subtitleBorder ? 'subtitle--border-left' : ''; ?>">
                    <?php esc_html_e($block["subtitle"]); ?>
                </h3>

                <div class="text">
                    <?php echo $block["text"]; ?>
                </div>

                <?php if ($link = get_link_url($block["button_1"])): ?>
                    <a class="btn" href="<?php esc_html_e($link); ?>">
                        <?php esc_html_e($block["button_1"]["label"]); ?>
                    </a>
                <?php endif; ?>

                <?php if ($link = get_link_url($block["button_2"] != "")): ?>
                    <a class="btn btn--nocolor btn--no-shadow" href="<?php esc_html_e($link); ?>">
                        <?php esc_html_e($block["button_2"]["label"]); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
