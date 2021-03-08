window.onload = function() {
    let templates = new Vue({
        el: "#vue",
        methods: {
            activate: function(path) {
                axios.post('ajax/togglePlugins.php', {
                    path: path,
                }).then(function (answer) {
                    if (answer.data == "") {
                        window.location.reload();
                    }
                    else {
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
}