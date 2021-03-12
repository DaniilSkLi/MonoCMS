Vue.component('settings-input', {
    data: function() {
        return {
            title: "",
            value: ""
        }
    },
    template: '<input v-model.lazy="value" type="text"></input>'
});

var settings = new Vue({
    el: "#vue",
    data: {
        AllSettings: {},
    },
    methods: {
        loadSettings: function({ el, going, direction }) {
            const name = el.getAttribute("setting_name");
            if (going == "in") {
                if (!Object.keys(settings.AllSettings).includes(name)) {
                    axios.post('ajax/getSettings.php', {
                        settings: name
                    }).then(function(answer) {
                        answer = answer.data[0];
                        answer.name = name;
                        Vue.set(settings.AllSettings, name, answer);
                        //settings.data.append(answer[0], "");
                        //el.innerHTML = "<button-counter></button-counter>";
                    });
                }
            }
        },

        SaveSettings: function() {

        }
    }
});