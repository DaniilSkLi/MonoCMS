<div class="page" id="vue">
    <!-- Заголовок -->
    <div class="page_title page_block_radius page_block_shadow"><?php ThePageTitle(); ?></div>

    <!-- Шапка - категории настроек. -->
    <!-- <div class="header"></div> -->

    <!-- глобальный див со всеми настройками -->
    <div class="settings">
        <!-- Основные настройки сайта -->
        <div v-waypoint="{ active: true, callback: loadSettings }" setting_name="site_settings" class="setting_block page_block_radius page_block_shadow">
            <div class="block_title">Site settings<hr></div>

            <div v-for="settings in AllSettings" class="block_content">
                <div v-if="settings.name == 'site_settings'">
                    <!-- Input variant -->
                    <div class="form-floating" v-if="settings.type == 'input'">
                        <input type="text" class="form-control" id="floatingInputGrid" v-model.lazy="settings.value" v-bind:placeholder="settings.title">
                        <label for="floatingInputGrid">{{ settings.title }}</label>
                    </div>
                </div>
            </div>

        </div>

        <div>
            <button v-on:click="SaveSettings" class="btn btn-primary page_block_radius page_block_shadow">Save settings</button>
        </div>
    </div>
</div>