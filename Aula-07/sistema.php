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
        echo "\n ----- Início do Programa ----- \n";

        $objArmazem = new Armazem;
        $objFabricante = new Fabricante;
        $objItem = new Item;
        $objMovimentacao = new Movimentacao;
        $objUsuario = new Usuario;

        switch ($_SERVER['argv'][1]) {
            case 'gravarUsuario':
                $this->gravarUsuario($objUsuario);
                break;
            case 'editarUsuario':
                $this->editarUsuario($objUsuario);
                break;
            default:
                echo "\n ERRO: A funcionalidade '{$_SERVER['argv'][1]}' não existe.\n";
                break;
        }
    }

    public function gravarUsuario($objUsuario): void 
    {
        echo "\n ----- Função gravarUsuario() ----- \n";

        $dados = $this->tratarDados();

        $objUsuario->set($dados);

        if ($objUsuario->save($dados))
        {
            echo "\n Usuário criado com sucesso. \n";
        };
    }

    public function editarUsuario($objUsuario): void 
    {
        echo "\n ----- Função gravarUsuario() ----- \n";

        $dados = $this->tratarDados();        

        $objUsuario->set($dados);

        if ($objUsuario->save($dados))
        {
            echo "\n Usuário editado com sucesso. \n";
        };
    }

    public function tratarDados() 
    {
        $args = explode(',', $_SERVER['argv'][2]);

        foreach ($args as $indice => $valor) {
            $arg = explode('=', $valor);
            
            $dados[$arg[0]] = $arg[1];
        }

        return $dados;
    }

    public function __destruct()
    {
        echo "\n ----- Fim do Programa ----- \n\n";
    }
}

new Main;
