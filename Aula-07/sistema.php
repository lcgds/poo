<?php

require('classes/Armazem.class.php');
require('classes/Fabricante.class.php');
require('classes/Item.class.php');
require('classes/Movimentacao.class.php');
require('classes/Usuario.class.php');

class Main
{
    public function __construct()
    {
        $objArmazem = new Armazem;
        $objFabricante = new Fabricante;
        $objItem = new Item;
        $objMovimentacao = new Movimentacao;
        $objUsuario = new Usuario;
    }

    public function __destruct()
    {
        echo "\n ----- Fim do Programa ----- \n\n";
    }
}

new Main;