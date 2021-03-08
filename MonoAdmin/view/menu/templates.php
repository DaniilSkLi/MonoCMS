<?php
    require_once ROOT_PATH . "MonoContent/templates/templates_indexer.php";
?>

<div class="page" id="vue">
    <!-- Заголовок -->
    <div class="page_title page_block_radius page_block_shadow"><?php ThePageTitle(); ?></div>

    <!-- Вывод всех установленых тем -->
    <div class="templates">
        <!-- Получение списка тем -->
        <?php
            $templates = GetTemplates();
            
            foreach ($templates as $theme) {
        ?>
                <div class="card page_block_radius page_block_shadow" style="width: 18rem;">
                    <img src="<?php echo $theme["ThemePath"] . "screenshot.png" ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <?php if ($theme["ThemeActive"]) { ?>
                            <span class="badge rounded-pill bg-success">Active</span>
                        <?php } ?>
                        <h5 class="card-title"><?php echo $theme["ThemeName"]; ?></h5>
                        <p class="card-text"><?php echo $theme["ThemeDescription"]; ?></p>
                        <div>
                            <small><span class="text-muted"><?php echo "Author: " . $theme["ThemeAuthor"]; ?></span></small></br>
                            <small><span class="text-muted"><?php echo "Version: " . $theme["ThemeVersion"]; ?></span></small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button v-on:click="activate('<?php echo $theme["ThemePath"]; ?>')" type="button" class="btn btn-primary page_block_radius activate" <?php if ($theme["ThemeActive"]) { echo "disabled"; } ?>>Activate</button>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
    <!-- Установка темы -->
    <div class="add_template"><button v-on:click="addTheme" type="button" class="btn btn-primary page_block_radius page_block_shadow">Add template</button></div>
</div>