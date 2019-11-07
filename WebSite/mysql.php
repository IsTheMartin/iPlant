<?php

include '../config/config.php';

class Mysql extends Dbconfig {
    public $connectionString;
    public $dataSet;
    private $sqlQuery;

    protected $database;
    protected $hostname;
    protected $username;
    protected $password;

    function Mysql(){
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;

    }
}

?>