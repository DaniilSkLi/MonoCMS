let templates = new Vue({
    el: "#vue",
    data: {
        templates: {}
    },
    methods: {
        loadTemplates: function() {
            axios.post('ajax/template.php', {
                command: "get"
            }).then(function(answer) {
                Vue.set(templates, "templates", answer.data);
                templates.sort();
            });
        },
        activate: function(index, path) {
            for (let i = 0; i < templates.templates.length; i++) {
                templates.templates[i].ThemeActive = false;
            }
            templates.templates[index].ThemeActive = true;

            axios.post('ajax/template.php', {
                command: "toggle",
                path: path
            }).then(function(answer) {
                if (!(answer.data === "")) {
                    alert("ERROR");
                }
            });
        },
        addTheme: function() {
            console.log("asd");
            alert("Unpack your theme and put theme folder to \"SiteName/MonoContent/templates/[put here]\"");
        },
        sort: function() {
            templates.templates.sort(function(a, b) {
                if (a.ThemeActive == false)
                    return 1;
                else
                    return -1;
            });
        }
    }
});

templates.loadTemplates();