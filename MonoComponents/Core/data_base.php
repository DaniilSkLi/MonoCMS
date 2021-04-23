<?php

class MONO_DB {
    public static function Insert($table, $data) {
        // data must be a assoc array

        self::TableName($table);
        $columns = "";
        $values = "";

        foreach ($data as $column => $value) {

            if ($columns == "")
                $columns .= $column;
            else
                $columns .= "`, `" . $column;

            if ($values == "")
                $values .= $value;
            else
                $values .= "', '" . $value;
            
        }

        $sql = "INSERT INTO `$table`(`$columns`) VALUES ('$values')";

        $result = self::Query($sql);

        if ($result == false) {
            return "Table not found.";
        }
        else {
            return true;
        }
    }

    public static function Select($table, $columns = "*", $where = NULL) {
        self::TableName($table);

        $sql = "SELECT " . $columns . " FROM `" . $table . "`";

        if ($where != NULL) {
            $sql .= " WHERE " . $where;
        }

        $result = self::Query($sql);

        if ($result == false) {
            return "Table or columns not found.";
        }
        else {
            return true;
        }
    }

    public static function CreateTable($name, $data) {
        self::TableName($name);
        $columns = "";

        for ($key = 0; $key < count($data); $key++) {
            $columns .= ", " . $data[$key];
        }

        $sql = "CREATE TABLE `$name` (`id` int PRIMARY KEY AUTO_INCREMENT $columns);";
        
        if (!self::ExistsTable($name)) {
            $result = self::Query($sql);
        }

        if ($result == false) {
            return "Error, the table already exists, or the parameters are incorrect.";
        }

    }

    public static function Exists($table, $where) {
        self::TableName($table);

        $sql = "SELECT * FROM `$table` WHERE $where";

        $result = self::Query($sql);

        if ($result->rowCount() === 0) {
            return false;
        }
        else {
            return true;
        }
    }

    public static function ExistsTable($table) {
        global $MONO_CONNECT;

        $sql = "SELECT 1 FROM `$table`";
        try {
            self::Query($sql);
            return true;
        }
        catch (PDOException $e) {
            return false;
        }
    }

    public static function Query($sql) {
        global $MONO_CONNECT;

        $result = $MONO_CONNECT->query($sql);
        return $result;
    }

    public static function TableName(&$table) {
        global $MONO_HOST;

        $table = $MONO_HOST["table_prefix"] . $table;

        return $table;
    }
}