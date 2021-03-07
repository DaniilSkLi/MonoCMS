window.onload = function() {
    let templates = new Vue({
        el: "#vue",
        methods: {
            activate: function(path) {
                axios.post('changeTemplate.php', {
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
            addTheme: function() {
                console.log("asd");
                alert("Unpack your theme and put theme folder to \"SiteName/MonoContent/templates/[put here]\"");
            }
        }
    });
}