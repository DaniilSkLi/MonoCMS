let plugins = new Vue({
    el: "#vue",
    data: {
        plugins: {}
    },
    methods: {
        loadPlugins: function() {
            axios.post('ajax/plugins.php', {
                command: "get",
            }).then(function (answer) {
                Vue.set(plugins, "plugins", answer.data);
            });
        },
        activate: function(path) {
            axios.post('ajax/plugins.php', {
                command: "toggle",
                path: path
            }).then(function (answer) {
                if (!(answer.data === "")) {
                    alert("ERROR");
                }
            });
        },
        addPlugin: function() {
            console.log("asd");
            alert("Unpack your plugin and put plugin folder to \"SiteName/MonoContent/plugins/[put here]\"");
        }
    }
});

plugins.loadPlugins();