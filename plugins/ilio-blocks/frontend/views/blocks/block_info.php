<div class="container-fluid block-info" style="background-image: url('<?php esc_html_e($block["img"]["url"]) ?>');">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <img class="mt--50" src="<?php esc_html_e($block["logo"]["url"]) ?>" alt="">

                <h2 class="mb--20 title title--light text-white">
                    <?php esc_html_e($block["title"]) ?>
                </h2>

                <div class="text text--white">
                    <?php echo $block["text"]; ?>
                </div>
            </div>
        </div>
    </div>
</div>
