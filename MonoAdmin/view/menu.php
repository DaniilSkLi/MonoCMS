<?php

require_once dirname(__DIR__) . "/check.php";
Check();

if (!isset($_GET["page"])) {
    $page = "dashboard";
}
else {
    $page = $_GET["page"];
}

// Functions

// ПРоверка на существование значения в titles.ini для перевода.
$titles = new MONO_Languages(LANG_PATH, "titles");
function TitleCheck($name, $file_name) {
    global $titles;

    $title = $titles->translate($file_name);

    if ($title != $file_name) {
        $name = $title;
    }

    return $name;
}

// Получение больше информации о данной странице в бд. и вывода лучшего заголовка (если нету перевода в titles.ini - выводится английский заголовок из бд.)
function GetPageTitle() {
    global $page;

    $pageInfo = MONO_AdminMenu::GetItemByFile($page);
    return TitleCheck($pageInfo["name"], $page);
}

// Обёртка для GetPageTitle() с выводом.
function ThePageTitle() {
    echo GetPageTitle();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Подключение Loading -->
        <?php require_once __DIR__ . "/loading.php"; ?>

        <!-- Подключение шапки (все нужные билиотеки и прочее) -->
        <?php GetHead(); ?>
        <!-- Подключение css -->
        <?php MONO_include_css_array([
            GetURI() . "view/CSS/menu.css",
            GetURI() . "view/CSS/menu/page.css",
            GetURI() . "view/CSS/menu/".$page.".css"
        ]); ?>

        <!-- <title><?php ThePageTitle(); ?></title> -->
        <title><?php MONO_Config::UnSet("test1") ?></title>
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
            
            $menu = MONO_AdminMenu::GetMenu();

            foreach ($menu as $item) {
                // Пробует получить заголовок вместо имени из БД (для перевода).
                $name = TitleCheck($item["name"], $item["file"]);

                echo "<div onclick=window.location.search='page=".$item["file"]."' class='item'><img src='view/Icons/Menu/".$item["icon"]."' alt='[i]'><span>".$name."</span></div>";
            }

            ?>
        </div>
        <!-- Конец меню -->

        <!-- Подключение самой страницы -->
        <?php require_once __DIR__ . "/menu/".$page.".php"; ?>
    </body>
    
    <!-- Подключение js -->
    <?php MONO_include_js_array([
        GetURI() . "view/JS/menu/".$page.".js"
    ]); ?>
</html>