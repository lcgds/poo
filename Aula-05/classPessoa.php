<?php

interface iComercio {
    public function vender();
    public function comprar();
}

abstract class Comercio {
    protected $nome;
    protected $tiposDeProdutos;

    public function comprar() {
        echo "\n Comprar. \n";
    }

    public function vender() {
        //
    }
}

class Ambulante extends Comercio {
    private $CPF;

    public function comprar() {
        echo "\n Ir até 25 de março. \n";
    }

    public function criarPromocao() {
        //
    }
}

class LojaFixa extends Comercio {
    private $CNPJ;

    public function comprar() {
        echo "\n Realizar orçamento. \n";
    }

    public function abrirFilial() {
        //
    }

    public function fecharFilial() {
        //
    }
}

$fulanoDeTal = new Ambulante;

$bazarChic = new LojaFixa;

$fulanoDeTal->comprar();

$bazarChic->comprar();