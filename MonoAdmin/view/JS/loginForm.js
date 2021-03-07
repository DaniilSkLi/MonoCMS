var Form = new Vue({
    el: "#loginForm",
    data: {
        login: "",
        password: "",
        error: ""
    },
    methods: {
        SignIn: function() {
            axios.post('signIn.php', {
                login: this.login,
                password: this.password
            })
            .then(function(result) {
                if (result.data == "refresh") {
                    window.location.reload();
                }
                else {
                    Form.error = result.data;
                }
            });
        }
    },
});