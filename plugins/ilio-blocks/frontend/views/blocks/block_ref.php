    <?php //var_dump($block);die; ?>
<div class="container block-ref">
    <div class="row mb--60">
        <div class="col-md-12 text-center">
            <h2 class="title">
                <?php esc_html_e($block["title"]) ?>
            </h2>
            <h3 class="subtitle">
                <?php esc_html_e($block["subtitle"]) ?>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                <span class="progress__item"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="block-ref-slider">
                <ul class="slides slider-ref">
                    <?php $i = 0; ?>
                    <?php foreach ($block["ref"] as $ref) : ?>
                        <?php if ($i == 0 || $i % 8 == 0): ?>
                            <li class="slider-ref__slide row">
                        <?php endif; ?>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb--30">
                            <a href="<?php esc_html_e($ref["link"]) ?>" class="img-link">
                                <div class="slide">
                                    <img src="<?php esc_html_e($ref["logo"]["url"]) ?>" alt="" class="img-original">
                                    <img src="<?php esc_html_e($ref["logo_white"]["url"]) ?>" alt="" class="img-white">
                                </div>
                            </a>
                        </div>

                        <?php $i++; ?>
                        <?php if ($i != 0 && $i % 8 == 0): ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if ($i % 8 !== 0): ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
