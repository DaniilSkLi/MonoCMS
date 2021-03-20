<?php
session_start();
class MONO_AutorizationControl {
    public static function SignUp($login, $password, $rights) {
        // CODE TO ADD ADMIN TO MYSQL
        // global $MONO_CONNECT;
        // $ini = MONO_GetIniArray(__DIR__ . "/Data/autorization.ini");
        // $sql = "INSERT INTO `" . $ini["table_prefix"] . "users`(`login`, `password`) VALUES('$login', '$password')";
        // $MONO_CONNECT->query($sql);
    }
    public static function SignIn($login, $password) {
        global $MONO_CONNECT, $MONO_HOST;
        if (!MONO_AutorizationControl::Check())
        {
            $sql = "SELECT * FROM `". $MONO_HOST["table_prefix"] ."users` WHERE `login`='".$login."'";
            $result = $MONO_CONNECT->query($sql);

            $user = $result->fetch();
            
            if ($user != false)
            {
                if ($user["password"] == $password) {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $sql = "UPDATE `". $MONO_HOST["table_prefix"] ."users` SET `ip`='".$ip."' WHERE `id`='".$user["id"]."'";
                    $MONO_CONNECT->query($sql);
                    $_SESSION["user_id"] = $user["id"];

                    return true;
                }
            }
            return false;
        }
        return true;
    }
    public static function Check() {
        global $MONO_CONNECT, $MONO_HOST;
        
        if (isset($_SESSION["user_id"])) {
            $ip = $_SERVER["REMOTE_ADDR"];

            $sql = "SELECT `ip` FROM `". $MONO_HOST["table_prefix"] ."users` WHERE `id`='" . $_SESSION["user_id"] . "'";
            $result = $MONO_CONNECT->query($sql);

            $user = $result->fetch();

            if ($user["ip"] == $ip) {
                return true;
            }
        }

        return false;
    }
}