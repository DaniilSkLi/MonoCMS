<?php

class MONO_DB {
    public static function Insert($table, $data) {
        // data must be a assoc array

        $check = self::CheckData($data);
        if ($check) return $check;

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

        return self::Send($sql);
    }

    public static function Update($table, $data, $where = NULL) {
        // data must be a assoc array

        $check = self::CheckData($data);
        if ($check) return $check;

        self::TableName($table);
        $set = "";

        foreach ($data as $column => $value) {

            if ($set == "")
                $set .= "`" . $column . "`='" . $value;
            else
                $set .= "', `" . $column . "`='" . $value;
        }

        $sql = "UPDATE `" . $table . "` SET " . $set;

        return self::Send($sql);
    }

    public static function Delete($table, $where) {
        $check = self::CheckData($where);
        if ($check) return "Where is empty.";

        self::TableName($table);

        $sql = "DELETE FROM `$table`";

        return self::Send($sql, $where);
    }

    public static function Select($table, $columns = "*", $where = NULL) {
        self::TableName($table);

        $sql = "SELECT " . $columns . " FROM `" . $table . "`";

        return self::Send($sql, $where);
    }

    public static function CreateTable($name, $data) {
        $check = self::CheckData($data);
        if ($check) return $check;

        self::TableName($name);
        $columns = "";

        foreach($data as $key => $type) {
            $columns .= ", `" . $key . "` " . $type;
        }

        $sql = "CREATE TABLE `$name` (`id` int PRIMARY KEY AUTO_INCREMENT $columns);";

        $result = self::ExistsTable($name);
        if (!$result) {
            $result = self::Query($sql);
            if (!$result) return "Error create table.";
        }
        if (!$result) {
            return "Table already exists.";
        }
    }

    public static function Drop($table) {
        self::TableName($table);

        $sql = "DROP TABLE " . $table;

        self::Query($sql);
    }

    public static function Exists($table, $where) {
        self::TableName($table);

        $sql = "SELECT * FROM `$table` WHERE $where";

        $result = self::Query($sql);

        if ($result == false || $result->rowCount() === 0) {
            return false;
        }
        else {
            return true;
        }
    }

    public static function ExistsTable($table) {
        $sql = "SELECT 1 FROM `$table`";

        try {
            $result = self::Query($sql);

            if (!$result) return false;
            return true;
        }
        catch (PDOException $e) {
            return false;
        }
    }

    private static function Send($sql, $where = NULL) {
        if ($where != NULL) {
            $sql .= " WHERE " . $where;
        }

        $result = self::Query($sql);

        if ($result == false) {
            return "Table or columns not found.";
        }
        else {
            return $result->fetchAll();
        }
    }

    private static function CheckData($data) {
        if ($data == array() || $data == "") {
            return "Data is empty.";
        }
        else {
            return false;
        }
    }

    public static function Query($sql) {
        global $MONO_CONNECT;

        $result = $MONO_CONNECT->PDO->query($sql);
        return $result;
    }

    public static function TableName(&$table) {
        global $MONO_CONNECT;

        $table = $MONO_CONNECT->TablePrefix . $table;

        return $table;
    }
}