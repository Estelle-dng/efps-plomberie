<div class="block-actus">
    <div class="container">
        <div class="text-center mb--60">
            <h1 class="title">
                Second titre
            </h1>
            <h2 class="subtitle">
                Sous titre
            </h2>
        </div>
        <div class="row mb--20">
            <?php foreach ($block["actus"] as $actu): ?>
                <?php setup_postdata( $GLOBALS['post'] =& $actu ); ?>
                <div class="col-md-4">
                    <?php get_template_part('content', 'listpost'); ?>
                </div>
            <?php endforeach; ?>

            <?php wp_reset_postdata(); ?>
        </div>

        <div class="text-center">
            <a class="btn mb--80" href="#">
                Lorem ipsum
            </a>
        </div>
    </div>
</div>
