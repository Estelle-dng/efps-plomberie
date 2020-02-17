
<?php get_header(); ?>

<div class="container mb--100 mt--100">
    <?php while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>
</div>

<section class="content">

    <?php display_list_blocks() ?>

</section>

<?php get_footer(); ?>
