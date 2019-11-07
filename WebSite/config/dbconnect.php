<?php

include '../config/config.php';

class DbConnect extends Dbconfig {
    protected $database;
    protected $hostname;
    protected $username;
    protected $password;

    function DbConnect(){
        $dbconn = new Dbconfig();
        $this -> database = $dbconn -> dbName;
        $this -> hostname = $dbconn -> serverName;
        $this -> username = $dbconn -> userName;
        $this -> password = $dbconn -> passCode;
    }

    function connect() {
        $conn = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $conn;
    }

    function disconnect(){
        $this -> database = NULL;
        $this -> hostname = NULL;
        $this -> username = NULL;
        $this -> password = NULL;
    }
}

?>