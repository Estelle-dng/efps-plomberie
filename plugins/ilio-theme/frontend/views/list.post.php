<?php display_filters_post(); ?>

<div class="container section">
    <?php if ($wpquery->have_posts()) : ?>
        <div class="row">
            <?php while ($wpquery->have_posts()) : $wpquery->the_post(); ?>
                <div class="col-md-4">
                    <?php get_template_part('content', 'listpost'); ?>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="row breadcrumb text-center">
            <?php echo pkr_paging_nav($wpquery); ?>
             <?php wp_reset_postdata(); ?>
        </div>

    <?php else: ?>
        <?php pll_e('Aucun article disponible', 'pkr') ?>
    <?php endif; ?>
</div>
