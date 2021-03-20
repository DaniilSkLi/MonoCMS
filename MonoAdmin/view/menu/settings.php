<div class="page" id="vue">
    <!-- Заголовок -->
    <div class="page_title page_block_radius page_block_shadow"><?php ThePageTitle(); ?></div>

    <!-- Шапка - категории настроек. -->
    <!-- <div class="header"></div> -->

    <!-- глобальный див со всеми настройками -->
    <div class="settings">
        <div class="setting_block page_block_radius page_block_shadow" v-for="(category, index) in categories">
            <div class="block_title">{{ category.name }}<hr></div>
            
            <div v-for="(value, name) in category['settings']" class="block_content">
                <!-- Input variant -->
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" v-model.lazy="categories[index]['settings'][name]">
                    <label for="floatingInputGrid">{{ name }}</label>
                </div>
            </div>
        </div>


        <div>
            <button v-on:click="saveSettings" class="btn btn-primary page_block_radius page_block_shadow">Save settings</button>
        </div>
    </div>
</div>