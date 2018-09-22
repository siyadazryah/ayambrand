<ul class="search-dropdown">
    <?php
    foreach ($results as $value) {
        ?>
        <li class="<?= $dropdown?>" id="<?= $value->location_code ?>">
            <?= $value->location_code ?>
        </li>
    <?php } ?>
</ul>

