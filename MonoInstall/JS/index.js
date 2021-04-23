Vue.component("next-btn", {
    template: "<div class='column'> <div class='buttons is-right'> <button type='submit' class='button is-primary is-light'> <span>Next</span> <i>→</i> </button> </div></div>"
});
Vue.component("back-btn", {
    template: "<div class='column'> <div class='buttons is-left'> <button type='submit' onclick='install.backPage()' class='button is-primary is-light'> <i>←</i> <span>Back</span> </button> </div></div>"
});

var install = new Vue({
    el: "#vue",
    data: {
        page: 1,
        error: "",
        page1: {
            db: "",
            host: "localhost",
            login: "root",
            password: "",
            prefix: "mono_"
        },
        page2: {
            login: "",
            password: ""
        }
    },
    methods: {
        nextPage: function() {
            axios.post("MonoInstall/ajax/page" + this.page + ".php", this["page" + this.page])
            .then((response) => {
                this.error = "";
                if (response.data == true)
                    this.page++;
                else if (response.data == "END")
                    this.page = "end";
                else
                    this.error = "Failed to connect";
                
                window.history.pushState('1', 'Title', '?page=' + this.page);
            });
        },
        backPage: function() {
            this.page--;
            window.history.pushState('1', 'Title', '?page=' + this.page);
        },
        toAdminPanel: function() {
            window.location.href = "MonoAdmin";
        }
    }
});

window.onload = function() {
    let params = (new URL(document.location)).searchParams;
    if (params.has("page")) {
        install.page = params.get("page");
    }
}