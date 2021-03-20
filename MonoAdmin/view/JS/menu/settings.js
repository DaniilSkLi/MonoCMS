var settings = new Vue({
    el: "#vue",
    data: {
        categories: {},
    },
    methods: {
        loadSettings: function() {
            axios.post('ajax/settings.php', {
                command: "get"
            }).then(function(answer) {
                Vue.set(settings, "categories", answer.data);
            });
        },

        saveSettings: function() {
            axios.post('ajax/settings.php', {
                command: "save",
                categories: settings.categories
            }).then(function(answer) {
                if (!(answer.data === "")) {
                    alert("ERROR");
                }
            });
        }
    }
});

settings.loadSettings();