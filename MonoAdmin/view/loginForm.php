<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php GetHead("Admin"); ?>
        <?php MONO_include_css(GetURI() . "view/CSS/loginForm.css"); ?>
        
        <title>Login</title>
    </head>
    <body>
        <form id="loginForm"> <!-- FORM -->
            <div class="content">
                <div class="title">
                    <span>Sign In</span>
                </div>
                <hr>
                <div class="input_block">
                    <input v-model.lazy="login" class="input" name="login" type="text" placeholder="Login">
                    <input v-model.lazy="password" class="input" name="password" type="password" placeholder="Password">
                </div>
                <input v-on:click="SignIn" class="input subm_btn" type="button" value="Sign in">
                <small class="error_text text-danger" v-show="error">{{ error }}</small>
            </div>
        </form>
    </body>
<?php MONO_include_js(GetURI() . "view/JS/loginForm.js"); ?>
</html>