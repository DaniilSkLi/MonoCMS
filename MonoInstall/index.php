<?php

require_once ROOT_PATH . "MonoComponents/GetLibs.php";
require_once ROOT_PATH . "MonoComponents/GetHead.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php GetHead("Install"); ?>
        <title>Document</title>
    </head>
    <body>
        <div id="vue" class="container">

            <form id="page_1" v-if="page == 1" class='mt-5' onsubmit="install.nextPage(); return false;">
                <h1 class='title is-1 mb-2'>Step {{ page }}</h1>
                <h5 class='is-size-5 mb-1'>Important settings</h5>
                <h6 class='is-size-6 has-text-danger'>{{ error }}</h6>

                <div class='columns mb-0 mt-0'>
                    <div class='column is-half-desktop is-half-tablet is-full-mobile'>
                        <div class="field">
                            <label class="label">Data base</label>
                            <div class="control">
                                <input required class="input" type="text" placeholder="Data base name" v-model="page1.db">
                            </div>
                        </div>
                    </div>
                    <div class='column is-half-desktop is-half-tablet is-full-mobile'>
                        <div class="field">
                            <label class="label">Host</label>
                            <div class="control">
                                <input required class="input" type="text" placeholder="Host url" v-model="page1.host">
                            </div>
                        </div>
                    </div>
                    <div class='column is-half-desktop is-half-tablet is-full-mobile'>
                        <div class="field">
                            <label class="label">Login</label>
                            <div class="control">
                                <input required class="input" type="text" placeholder="DB login" v-model="page1.login">
                            </div>
                        </div>
                    </div>
                    <div class='column is-half-desktop is-half-tablet is-full-mobile'>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="DB password" v-model="page1.password">
                            </div>
                        </div>
                    </div>
                    <div class='column is-half-desktop is-half-tablet is-full-mobile'>
                        <div class="field">
                            <label class="label">Table prefix</label>
                            <div class="control">
                                <input required class="input" type="text" placeholder="DB table prefix" v-model="page1.prefix">
                            </div>
                        </div>
                    </div>
                </div>

                <div class='columns mb-0'>
                    <next-btn></next-btn>
                </div>
            </form>

            <form id="page_2" v-if="page == 2" class='mt-5' onsubmit="install.nextPage(); return false;">
                <h1 class='title is-1 mb-2'>Step {{ page }}</h1>
                <h5 class='is-size-5 mb-1'>Admin settings</h5>
                <h6 class='is-size-6 has-text-danger'>{{ error }}</h6>

                <div class='columns mb-0 mt-0'>
                    <div class='column is-half-desktop is-half-tablet is-full-mobile'>
                        <div class="field">
                            <label class="label">Login</label>
                            <div class="control">
                                <input required class="input" type="text" placeholder="Admin login" v-model="page2.login">
                            </div>
                        </div>
                    </div>
                    <div class='column is-half-desktop is-half-tablet is-full-mobile'>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input required class="input" type="password" placeholder="Admin password" v-model="page2.password">
                            </div>
                        </div>
                    </div>
                    <div class='column is-half-desktop is-half-tablet is-full-mobile'>
                        <div class="form-check pt-0">
                            <input required class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                You agree to our <a href="https://www.google.com" target="_blank">policy</a>
                            </label>
                        </div>
                    </div>
                </div>

                <div class='columns mb-0'>
                    <back-btn></back-btn>
                    <next-btn></next-btn>
                </div>
            </form>
        </div>
    </body>
    <?php MONO_include_js(ROOT_URI . "MonoInstall/JS/index.js"); ?>
    <?php MONO_include_css(ROOT_URI . "MonoInstall/CSS/index.css"); ?>
</html>