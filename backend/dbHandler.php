<?php

class DbHandler {

    private $conn;

    function __construct() {

        require_once 'dbConnect.php';
        $db = new dbConnect();
        $this->conn = $db->connect();
    }

    public function getOneRecord($query) {

        $result = $this->conn->query($query.' LIMIT 1') or die($this->conn->error.__LINE__);

        return $result = $result->fetch_assoc();
    }

    public function insertIntoTable($values, $columns, $table_name) {

        $str = "'" . implode("','", $values) . "'";
        $query = "INSERT INTO ".$table_name."(" . implode($columns,',') . ") VALUES(" . $str . ")";
        $result = $this->conn->query($query) or die($this->conn->error.__LINE__);

        if ($result) {

            $new_row_id = $this->conn->insert_id;
            return $new_row_id;
        } else {

            return NULL;
        }
    }

}
