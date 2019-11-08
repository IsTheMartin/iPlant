<?php

include '../config/dbconfig.php';

class DbConnect extends Dbconfig
{
    protected $database;
    protected $hostname;
    protected $username;
    protected $password;
    protected $sql;

    function DbConnect()
    {
        $dbconn = new Dbconfig();
        $this->sql = "mysql:host=$dbconn->serverName;dbname=$dbconn->dbName;";
        $this->username = $dbconn->userName;
        $this->password = $dbconn->passCode;
    }

    function connect()
    {
        try {
            $conn = new PDO($this->sql, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $conn;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    function disconnect()
    {
        $this->database = NULL;
        $this->hostname = NULL;
        $this->username = NULL;
        $this->password = NULL;
    }
}
