<div class="container-fluid block-pictos block-pictos--padding" style="background-image: url('<?php esc_html_e($block["img"]["url"]) ?>');">
    <div class="block-pictos__layer"></div>
    <div class="container">
        <div class="text-center block-pictos__title mb--100">
            <h1 class="title text-white">
                <?php esc_html_e($block["title"]) ?>
            </h1>
            <h2 class="subtitle">
                <?php esc_html_e($block["subtitle"]) ?>
            </h2>
        </div>

        <div class="mb--100 clearfix">
            <?php if (count($block["elements"]) == 5): ?>
                <?php $col = 15; ?>
            <?php else: ?>
                <?php $col = 12 / count($block["elements"]); ?>
            <?php endif; ?>

            <?php foreach ($block["elements"] as $element): ?>
                <div class="col-md-<?php echo $col; ?> text-center mb--20 col-sm-4 col-xs-6">
                    <div class="block-pictos__picto">
                        <img src="<?php esc_html_e($element['image']['url']) ?>">
                    </div>

                    <div class="block-pictos__pictotitle">
                        <?php esc_html_e($element['title']); ?>
                    </div>

                    <div class="text text-white">
                        <?php echo $element['text']; ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <?php if (isset($block['canvas_title'])) :  ?>
            <div class="mb--200" style="display: inline-block;"></div>
        <?php endif; ?>
    </div>
</div>

<?php if (isset($block['canvas_title'])) :  ?>
<div class="container block-pictos">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="text-center block-pictos__card">
                <h3 class="title title--card-small mb--40">
                    <?php esc_html_e($block["canvas_title"]) ?>
                </h3>

                <div class="text">
                    <?php echo $block["canvas_text"] ?>
                </div>

                <?php if ($link = get_link_url($block["button_1"])): ?>
                    <a class="btn btn--nocolor btn--no-shadow mb--20 mr--15 mr-xs--0" href="<?php esc_html_e($link); ?>">
                        <?php esc_html_e($block["button_1"]["label"]); ?>
                    </a>
                <?php endif; ?>

                <?php if ($link = get_link_url($block["button_2"])): ?>
                    <a class="btn mb--20 " href="<?php esc_html_e($link); ?>">
                        <?php esc_html_e($block["button_2"]["label"]); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>