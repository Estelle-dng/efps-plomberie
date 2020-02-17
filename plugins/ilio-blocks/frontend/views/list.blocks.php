<?php if ($blocks) : ?>
    <?php foreach ($blocks as $block): ?>
        <?php display_block($block["acf_fc_layout"], $block["fields"]); ?>
    <?php endforeach; ?>
<?php endif; ?>