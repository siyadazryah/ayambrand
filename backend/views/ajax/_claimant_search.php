<ul class="search-dropdown">
    <?php
    foreach ($results as $value) {
        ?>
        <li class="search-claimant" id="<?= $value->claimant_id ?>">
            <?= $value->claimant_id ?>
        </li>
    <?php } ?>
</ul>

