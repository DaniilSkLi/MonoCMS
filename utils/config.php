<?php

class MONO_Config {
    private $table;

    public function __construct($table) {
        $this->table = $table;

        if (!MONO_DB::ExistsTable($table)) {
            MONO_DB::CreateTable($table, array(
                "name" => "varchar(512)",
                "value" => "varchar(1024)"
            ));
        }
    }

    public function Set($name, $value) {
        if (!MONO_DB::Exists($this->table, "`name`='$name'")) {
            return MONO_DB::Insert($this->table, array(
                "name" => $name,
                "value" => $value
            ));
        }
        else return false;
    }

    public function Get($name) {
        return MONO_DB::Select($this->table, "value", "`name`='$name'")[0][0];
    }

    public function UnSet($name) {
        return MONO_DB::Delete($this->table, "`name`='$name'");
    }

    public function Destroy() {
        return MONO_DB::Drop($this->table);
    }
}