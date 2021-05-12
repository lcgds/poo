<?php

require('classes/Armazem.class.php');
require('classes/Fabricante.class.php');
require('classes/Item.class.php');
require('classes/Movimentacao.class.php');
require('classes/Usuario.class.php');

class Main
{

    private $objArmazem;
    private $objFabricante;
    private $objItem;
    private $objMovimentacao;
    private $objUsuario;

    public function __construct()
    {
        echo "\n ----- Início do Programa ----- \n";

        $this->objArmazem = new Armazem;
        $this->objFabricante = new Fabricante;
        $this->objItem = new Item;
        $this->objMovimentacao = new Movimentacao;
        $this->objUsuario = new Usuario;

        $this->verificarSeExisteArg(1);

        $this->executarOperacao($_SERVER['argv'][1]);
    }

    private function executarOperacao(string $operacao) 
    {
        switch ($operacao) {
            case 'gravarUsuario':
                $this->gravarUsuario();
                break;
            case 'editarUsuario':
                $this->editarUsuario();
                break;
            case 'listarUsuario':
                $this->listarUsuario();
                break;
            case 'apagarUsuario':
                $this->apagarUsuario ();
                break;
            default:
                echo "\n ERRO: A funcionalidade '{$obj}' não existe.\n";
                break;
        }
    }

    private function gravarUsuario(): void 
    {
        echo "\n ----- Função gravarUsuario() ----- \n";

        $dados = $this->tratarDados();

        $this->objUsuario->set($dados);

        if ($this->objUsuario->save($dados))
        {
            echo "\n Usuário criado com sucesso. \n";
        };
    }

    private function listarUsuario() 
    {
        $lista = $this->objUsuario->getAll();
        
        echo "ID\tCPF\tNOME\n";

        foreach ($lista as $usuario) {
            echo "{$usuario['id']}\t{$usuario['cpf']}\t{$usuario['nome']}\n";
        }
    }

    private function editarUsuario(): void 
    {
        echo "\n ----- Função gravarUsuario() ----- \n";

        $dados = $this->tratarDados();        

        $this->objUsuario->set($dados);

        if ($this->objUsuario->save($dados))
        {
            echo "\n Usuário editado com sucesso. \n";
        };
    }

    private function apagarUsuario() 
    {
        $dados = $this->tratarDados();

        $this->objUsuario->set($dados); 
        
        if ($this->objUsuario->delete()) {
            echo "\n Usuário apagado com sucesso. \n";
        } else {
            echo "\n Erro ao tentar apagar o usuário. \n";
        }
    }

    private function tratarDados() 
    {
        $this->verificarSeExisteArg(2);

        $args = explode(',', $_SERVER['argv'][2]);

        foreach ($args as $indice => $valor) {
            $arg = explode('=', $valor);
            
            $dados[$arg[0]] = $arg[1];
        }

        return $dados;
    }

    private function verificarSeExisteArg(int $arg) 
    {
        if (!isset($_SERVER['argv'][$arg])) {
            echo "\n\nErro: para utilizar o programa digite: php sistema.php [operacao] [dados=valor,dado2=valor2,dadoN=valorN]\n\n\n";

            exit();
        }
    }

    public function __destruct()
    {
        echo "\n ----- Fim do Programa ----- \n\n";
    }
}

new Main;
