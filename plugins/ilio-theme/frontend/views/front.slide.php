<?php // Home Slider ?>

<?php if (count($slides) > 0): ?>
    <section>
        <div class="pp-slider slider-home">
            <?php if ($slides) : ?>
                <?php foreach ($slides as $slide): ?>
                    <?php if ($slide['image']): ?>
                    <div class="slider-home__slide" style="background-image: url('<?php esc_html_e($slide['image']['url']); ?>')">
                        <div class="slider-home__content">
                            <?php if ($slide['title'] != ""): ?>
                                <h2 class="slider-home__title">
                                    <?php esc_html_e($slide['title']); ?>
                                </h2>
                            <?php endif; ?>

                            <?php if ($slide['subtitle'] != ""): ?>
                                <h3 class="slider-home__subtitle">
                                    <?php esc_html_e($slide['subtitle']); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($slide['text'] != ""): ?>
                                <div class="slider-home__text">
                                    <?php echo nl2br($slide['text']); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($slide['fields']['link_internal'] != "" || $slide['fields']['link_external'] != ""): ?>
                                <a href="<?php echo $slide['fields']['link_' . $slide['fields']['type']]; ?>"
                                    class="btn btn--transparent" <?php if ($slide['fields']['type'] == 'external'): ?>target="_blank"<?php endif; ?>>
                                    <?php esc_html_e($slide['fields']['label']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
