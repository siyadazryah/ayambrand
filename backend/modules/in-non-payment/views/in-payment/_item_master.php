<ul class="search-dropdown">
    <?php
    foreach ($results as $value) {
        ?>
        <li class="<?= $dropdown?>" id="<?= $value->code ?>">
            <?= $value->code ?>
        </li>
    <?php } ?>
</ul>

