<?php
require_once './src/Models/Connector.php';
require_once './src/Models/Tables.php';
class OrdersDetails extends Connector{
    public function __construct(){
        parent::__construct(TBL_ORDERSDETAILS);
    }

    public function selectAll(){
        $tbl = $this->tbl;
        $results = array();
        $query = "SELECT * FROM $tbl";
        $sql = $this->conn->query($query);
        if(!$sql){
            /* return $this->conn->error; */
        }
        while($row = $sql->fetch_assoc()){
            array_push($results, $row);
        }
        $sql->close();
        return $results;
    }
    public function selectOne($id){
        $tbl = $this->tbl;
        $results = array();
        $query = "SELECT * FROM $tbl";
        $sql = $this->conn->query($query);
        if(!$sql){
            /* return $this->conn->error; */
        }
        while($row = $sql->fetch_assoc()){
            array_push($results, $row);
        }
        $sql->close();
        return $results[0]; // Quiero solo el primer elemento.

    }
    public function deleteOne(){

    }
    public function updateOne($id, $model){


    }
    public function insertOne($model){

    }
}