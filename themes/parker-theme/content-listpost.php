<article>
    <div class="block-actus__block">
        <a class="block-actus__blocklink" href="<?php the_permalink() ?>">
            <div class="block-actus__thumb" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
            <div class="block-actus__card">
                <?php $cats = get_the_category(); ?>

                <?php if ($cats): ?>
                <ul class="block-actus__list-cat">
                    <?php foreach ($cats as $cat): ?>
                        <li><?php esc_html_e($cat->name) ?></li>
                    <?php endforeach ?>
                </ul>
                <?php endif ?>

                <h3 class="title title--card">
                    <?php the_title() ?>
                </h3>

                <div class="text">
                    <?php the_excerpt(); ?>
                </div>

                <div class="row block-actus__tags">
                    <div class="col-md-7 pull-left">
                        REVUE DE PRESSE
                    </div>
                    <div class="col-md-5 pull-right">
                        <?php the_date('d.m.Y'); ?>
                    </div>
                </div>
            </div>
        </a>
    </div>
</article>