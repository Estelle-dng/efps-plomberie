<div class="container">
    <div class="filter-title">
        <?php pll_e('Filtrer les actualités', 'ilio'); ?>
    </div>

    <form action="" method="get">
        <div class="row">
            <div class="col-md-3">
                <div class="filter-subtitle"><?php pll_e('Catégorie', 'ilio') ?></div>
                <?php $categories = get_categories( ['hide_empty' => 0] ); ?>
                <?php foreach ($categories as $cat): ?>
                    <div>
                        <input id="cat-<?php esc_html_e($cat->term_id) ?>" type="checkbox" name="cats[]" value="<?php esc_html_e($cat->term_id) ?>" <?php if (check_in_params('cats', $cat->term_id)): ?>checked<?php endif ?>>
                        <label for="cat-<?php esc_html_e($cat->term_id) ?>">
                            <?php esc_html_e($cat->name) ?>
                        </label>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="col-md-3">
                <div class="filter-subtitle"><?php pll_e('Date', 'ilio') ?></div>
                <div>
                    <?php foreach ($years as $year): ?>
                        <div>
                            <input id="year-<?php esc_html_e($year) ?>" type="checkbox" name="years[]" value="<?php esc_html_e($year) ?>" <?php if (check_in_params('years', $year)): ?>checked<?php endif ?>>
                            <label for="year-<?php esc_html_e($year) ?>">
                                <?php esc_html_e($year) ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="filter-subtitle"><?php pll_e('Mot clé', 'ilio') ?></div>
                <input type="text" class="search-btn" name="skey" value="<?php isset($_GET['skey']) ? esc_html_e($_GET['skey']) : '' ?>" placeholder='<?php esc_html_e('Votre recherche', 'ilio'); ?>'>
                <i class="fa fa-search fa-search-btn" aria-hidden="true"></i>
            </div>

        </div>

        <div class="row text-center mt--40">
            <button class="btn"><?php pll_e('Appliquer') ?></button>
        </div>
    </form>
</div>
