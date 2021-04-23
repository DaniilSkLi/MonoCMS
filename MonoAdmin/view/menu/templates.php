<div class="page" id="vue">
    <!-- Заголовок -->
    <div class="page_title page_block_radius page_block_shadow"><?php ThePageTitle(); ?></div>

    <!-- Вывод всех установленых тем -->
    <div class="templates">
        <!-- Получение списка тем -->

        <div class="card page_block_radius page_block_shadow" style="width: 18rem;" v-for="(theme, index) in templates">
            <img v-bind:src="theme.ThemePath" class="card-img-top" alt="">
            <div class="card-body">
                <span v-if="theme.ThemeActive">
                    <span class="badge rounded-pill bg-success">Active</span>
                </span>
                <h5 class="card-title">{{ theme.ThemeName }}</h5>
                <p class="card-text">{{ theme.ThemeDescription }}</p>
                <div>
                    <small><span class="text-muted">Author: {{ theme.ThemeAuthor }}</span></small></br>
                    <small><span class="text-muted">Version: {{ theme.ThemeVersion }}</span></small>
                </div>
            </div>
            <div class="card-footer">
                <button v-on:click="activate(index, theme.ThemePath)" type="button" class="btn btn-primary page_block_radius activate" v-bind:disabled="theme.ThemeActive ? true : false">Activate</button>
            </div>
        </div>
    </div>
    <!-- Установка темы -->
    <div class="add_template"><button v-on:click="addTheme" type="button" class="btn btn-primary page_block_radius page_block_shadow">Add template</button></div>
</div>