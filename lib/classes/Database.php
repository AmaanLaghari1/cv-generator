<?php
class Database {

    private function conn(){
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'cv';

        $conn = new mysqli($server, $username, $password, $dbname);

        if($conn->connect_error){
            die("Connection Failed!");
        }

        return $conn;
    }

    private function getBindParamDataType($data){
        $dType = '';

        foreach($data as $val){
            if(is_integer($val)) $dType .= 'i';
            elseif(is_string($val)) $dType .= 's';
            elseif(is_float($val)) $dType .= 'd';
            else $dType .= 'b';
        }

        return $dType;
    }

    private function getLabels($values){

        $len = count($values);
        $labels = '';

        for($i = 0; $i < $len; $i++){
            $labels .= '?,';
        }

        return rtrim($labels, ',');
    }

    public function insert($table, $columns, $values){
        $labelCount = $this->getLabels($values);

        $query = "INSERT INTO $table ($columns) VALUES ($labelCount)";

        $conn = $this->conn();

        $stmt = $conn->prepare($query);
        $stmt->bind_param($this->getBindParamDataType($values), ...$values);

        return $stmt->execute();
    }

    public function select($table, $columns='*', $where=''){
        $query = "SELECT $columns FROM $table $where";

        $conn = $this->conn();
        $result = $conn->query($query);

        return $result->fetch_all(true);
    }

    public function delete($table, $where){
        $query = "DELETE FROM $table WHERE $where";

        $conn = $this->conn();

        return $conn->query($query);
    }

    private function getUpdLabels($data){
        $labels = '';

        foreach($data as $key=>$value){
            $labels .= "$key = '$value',";
        }

        return rtrim($labels, ',');
    }

    public function update($table, $updArray, $where){
        $updColumns = $this->getUpdLabels($updArray);
        $query = "UPDATE $table SET $updColumns WHERE $where";

        $conn = $this->conn();

        return $conn->query($query);
    }
}