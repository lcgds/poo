<?php

abstract class Database extends PDO
{

    private $driver = 'mysql';
    private $host = 'localhost';
    private $port = '3306';
    private $user = 'root';
    private $password = 'Eunaosei!123@';
    private $dbname = 'poo';

    protected function __construct()
    {
        $dns = $this->driver . 
        ': host=' . $this->host .
        '; port=' . $this->port .
        '; dbname=' . $this->dbname;

        parent::__construct($dns, $this->user, $this->password); 
    }

}
