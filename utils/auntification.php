<?php

session_start();
class MONO_Auth {
    private $table;
    private $cfg;

    public function __construct($table) {
        $this->table = $table;
        $this->cfg = new MONO_Config($this->table);
    }

    public function SignUp($user, $password) {
        return $this->cfg->Set($user, password_hash($password, PASSWORD_DEFAULT));
    }

    public function SignIn($user, $password) {
        $hash = $this->cfg->Get($user);
        if (isset($hash)) {
            $pass = password_verify($password, $hash);
            if ($pass) {
                $_SESSION[$this->table . "_ip"] = $_SERVER["REMOTE_ADDR"];
                return true;
            }
            else return false;
        }
        else return false;
    }

    public function SignOut($all = false) {
        unset($_SESSION[$this->table . "_ip"]);
        if ($all) {
            unset($_SESSION);
            session_unset();
            session_destroy();
        }
    }

    public function Check() {
        if (isset($_SESSION[$this->table . "_ip"]))
            return $_SESSION[$this->table . "_ip"] === $_SERVER["REMOTE_ADDR"];
        else
            return false;
    }
}