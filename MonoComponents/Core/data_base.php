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
                $columns .= ", '" . $column;

            if ($values == "")
                $values .= $value;
            else
                $values .= ", '" . $value;
            
        }

        $sql = "INSERT INTO ('$columns') VALUES ('$values')";

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
        $columns = "";

        for ($key = 0; $key < count($data); $key++) {
            $columns .= ", " . $data[$key];
        }

        $sql = "CREATE TABLE `$name` (`id` int NOT NULL PRIMARY KEY $columns);";

        $result = self::Query($sql);

        if ($result == false) {
            return "Error, the table already exists, or the parameters are incorrect.";
        }

    }

    public static function Query($sql) {
        global $MONO_CONNECT;

        return $MONO_CONNECT->query($sql);
    }

    public static function TableName(&$table) {
        global $MONO_HOST;

        $table = $MONO_HOST["table_prefix"] . $table;

        return $table;
    }
}