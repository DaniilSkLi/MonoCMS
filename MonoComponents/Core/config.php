<?php

class MONO_Config {
    public static function Set($name, $value) {
        global $MONO_CONNECT, $MONO_HOST;
        $table = $MONO_HOST["table_prefix"] . "config";

        $result = self::GetPDO_Object($name);

        if ($result->rowCount() === 0) {
            $sql = "INSERT INTO `$table` (`name`, `value`) VALUES ('$name', '$value')";
        }
        else {
            $sql = "UPDATE `$table` SET `value`='$value' WHERE `name`='$name'";
        }
        $MONO_CONNECT->query($sql);
    }
    
    public static function UnSet($name) {
        global $MONO_CONNECT, $MONO_HOST;
        $table = $MONO_HOST["table_prefix"] . "config";

        $sql = "DELETE FROM `$table` WHERE `name`='$name'";
        $MONO_CONNECT->query($sql);
    }

    public static function Get($name) {

        $result = self::GetPDO_Object($name);
        $result = $result->fetch();
        
        if (isset($result["value"])) {
            return $result["value"];
        }
        else {
            return NULL;
        }
    }
    
    private static function GetPDO_Object($name) {
        global $MONO_CONNECT, $MONO_HOST;
        $table = $MONO_HOST["table_prefix"] . "config";

        $sql = "SELECT * FROM `$table` WHERE `name`='$name'";
        $result = $MONO_CONNECT->query($sql);
        return $result;
    }
}