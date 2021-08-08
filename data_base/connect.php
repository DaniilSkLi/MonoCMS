<?php

class MONO_Connect {
    private $x = array("PDO" => null, "TablePrefix");

    public function Try() {
        try {
            $ini = new MONO_ini(CORE . "Data/connect.ini");
            $MONO_HOST = $ini->Get();

            $this->x["TablePrefix"] = $MONO_HOST["table_prefix"];
            $this->x["PDO"] = new PDO('mysql:dbname='.$MONO_HOST["db"].';host='.$MONO_HOST["host"], $MONO_HOST["login"], $MONO_HOST["password"]);

            unset($ini);
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function __get($name) {
        if (isset($this->x[$name])) {
            $r = $this->x[$name];
            return $r;
        }
        else {
            return null;
        }
    }
}