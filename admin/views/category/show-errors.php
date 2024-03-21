<?php if (!empty($_SESSION["errors"])) : ?>
    <?php foreach ($_SESSION["errors"] as $errors) : ?>
        <span class="text-danger">
            <?= $errors ?>
        </span>
    <?php endforeach ?>
    <?php unset($_SESSION["errors"]); ?>
    <?php unset($_SESSION["data"]); ?>
<?php endif; ?>