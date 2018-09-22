<ul class="search-dropdown">
    <?php
    foreach ($results as $value) {
        ?>
        <li class="<?= $dropdown ?>" attr_item="<?= $attr ?>" id="<?= $value->code ?>">
            <?= $value->code ?>
        </li>
    <?php } ?>
</ul>

