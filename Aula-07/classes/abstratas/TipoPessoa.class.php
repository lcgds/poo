<?php

require_once 'Database.class.php';

abstract class TipoPessoa extends Database 
{
    public function __construct()
    {
        parent::__construct();
    }
    
    protected $id;
    protected $nome;
}
