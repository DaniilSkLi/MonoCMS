<?php

if (!$index)
{
    Header("Location: ../index.php");
    exit();
}

if (!isset($_GET["page"])) {
    $page = "dashboard";
}
else {
    $page = $_GET["page"];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php GetHead(); ?>
        <?php MONO_include_css_array([
            GetURI() . "view/CSS/menu.css",
            GetURI() . "view/CSS/menu/page.css",
            GetURI() . "view/CSS/menu/".$page.".css"
        ]); ?>

        <title><?php TheTitle("admin", $page); ?></title>
    </head>
    <body>
    <!-- Меню -->
        <div class="menu">
            
            <!-- Макет элемента меню -->
            <!-- <div class="item">
                <img src="<?php echo ROOT_URI ?>MonoComponents/Favicons/default.ico" alt="">
                <span>Mono CMS</span>
            </div> -->

            <!-- PHP код для вывода меню -->
            <?php
            
            $menu = AdminMenu::GetMenu();

            foreach ($menu as $item) {
                echo "<div onclick=window.location.search='page=".$item["file"]."' class='item'><img src='view/Icons/Menu/".$item["icon"]."' alt='[SVG]'><span>".$item["name"]."</span></div>";
            }

            ?>
        </div>
        <!-- Конец меню -->

        <!-- Подключение самой страницы -->
        <?php require_once __DIR__ . "/menu/".$page.".php"; ?>
    </body>
</html>