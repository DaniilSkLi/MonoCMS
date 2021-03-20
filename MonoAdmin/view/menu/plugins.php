<?php
    require_once ROOT_PATH . "MonoContent/plugins/plugins_indexer.php";
?>

<div class="page" id="vue">
    <!-- Заголовок -->
    <div class="page_title page_block_radius page_block_shadow"><?php ThePageTitle(); ?></div>

    <!-- Вывод всех установленых плагинов5 -->
    <div class="plugins">
        <!-- Получение списка плагинов -->

        <div class="card page_block_radius page_block_shadow" style="width: 18rem;" v-for="(plugin, index) in plugins">
            <img v-bind:src="plugin.PluginPath" class="card-img-top" alt="">
            <div class="card-body">
                <span v-if="plugin.PluginActive">
                    <span class="badge rounded-pill bg-success">Active</span>
                </span>
                <h5 class="card-title">{{ plugin.PluginName }}</h5>
                <p class="card-text">{{ plugin.PluginDescription }}</p>
                <div>
                    <small><span class="text-muted">Author: {{ plugin.PluginAuthor }}</span></small></br>
                    <small><span class="text-muted">Version: {{ plugin.PluginVersion }}</span></small>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-check form-switch">
                    <input v-on:click="activate(plugin.PluginPath)" class="form-check-input float-end" type="checkbox" id="flexSwitchCheckDefault" v-model="plugins[index].PluginActive">
                </div>
            </div>
        </div>

    </div>
    <!-- Установка темы -->
    <div class="add_template"><button v-on:click="addPlugin" type="button" class="btn btn-primary page_block_radius page_block_shadow">Add plugin</button></div>
</div>