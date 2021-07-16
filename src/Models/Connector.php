<?php
require_once './src/Models/IModel.php';
require_once './src/Models/Details.php';
abstract class Connector implements IModel{
    protected function __construct($tbl){
        $this->conn = new mysqli(HOST, USER, PASS, DB_NAME);
        $this->conn->set_charset("utf8");
        $this->tbl = $tbl;
    }
}