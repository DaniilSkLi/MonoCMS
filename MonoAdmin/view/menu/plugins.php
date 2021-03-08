<?php
    require_once ROOT_PATH . "MonoContent/plugins/plugins_indexer.php";
?>

<div class="page" id="vue">
    <!-- Заголовок -->
    <div class="page_title page_block_radius page_block_shadow"><?php ThePageTitle(); ?></div>

    <!-- Вывод всех установленых тем -->
    <div class="plugins">
        <!-- Получение списка тем -->
        <?php
            $plugins = GetPlugins();

            foreach ($plugins as $plugin) {
        ?>
                <div class="card page_block_radius page_block_shadow" style="width: 18rem;">
                    <img src="<?php echo $plugin["PluginPath"] . "screenshot.png" ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <?php if ($plugin["PluginActive"]) { ?>
                            <span class="badge rounded-pill bg-success">Active</span>
                        <?php } ?>
                        <h5 class="card-title"><?php echo $plugin["PluginName"]; ?></h5>
                        <p class="card-text"><?php echo $plugin["PluginDescription"]; ?></p>
                        <div>
                            <small><span class="text-muted"><?php echo "Author: " . $plugin["PluginAuthor"]; ?></span></small></br>
                            <small><span class="text-muted"><?php echo "Version: " . $plugin["PluginVersion"]; ?></span></small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button v-on:click="activate('<?php echo $plugin["PluginPath"]; ?>')" type="button" class="btn btn-primary page_block_radius activate" <?php if ($plugin["PluginActive"]) { echo "disabled"; } ?>>Activate</button>
                        <button v-on:click="activate('<?php echo $plugin["PluginPath"]; ?>')" type="button" class="btn btn-secondary page_block_radius activate" <?php if (!$plugin["PluginActive"]) { echo "disabled"; } ?>>Deactivate</button>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
    <!-- Установка темы -->
    <div class="add_template"><button v-on:click="addPlugin" type="button" class="btn btn-primary page_block_radius page_block_shadow">Add plugin</button></div>
</div>