<?php
$menu = array(
    "home",
    "item",
    "item",
    "item",
    "item"
);
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <?php foreach ($menu as $key) : ?>
            <?php if (isset($_GET['action'])) : ?>
                <?php if ($_GET['action'] == $key) : ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=<?php echo $key ?>"><?php echo $key ?></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=<?php echo $key ?>"><?php echo $key ?></a>
                    </li>
                <?php endif ?>
            <?php else : ?>
                <?php if ($key == "home") : ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=<?php echo $key ?>"><?php echo $key ?></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=<?php echo $key ?>"><?php echo $key ?></a>
                    </li>
                <?php endif ?>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
</nav>