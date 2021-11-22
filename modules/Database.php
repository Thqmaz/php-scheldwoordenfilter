<?php
class Database extends Config
{
    public $connection;

    public function __construct()
    {
        $this->getConnection();
    }

    public function getConnection()
    {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
    }
}