<?php

require(__DIR__ . '/../interfaces/iUsuario.interface.php');

require_once(__DIR__ . '/abstratas/TipoPessoa.class.php');

class Usuario extends TipoPessoa implements iUsuario
{
    private $cpf;

    public function __construct() 
    {
        parent::__construct();
    }

    public function set(array $dados): bool
    {
        if($dados) 
        {
            $this->id = $dados['id'] ?? null;
            $this->cpf = $dados['cpf'] ?? null;
            $this->nome = $dados['nome'] ?? null; 
            return true;
        } else 
        {
            return false;
        }
    }

    public function insert() {
        $stmt = $this->prepare('INSERT INTO Usuario
                                        (cpf, nome) 
                                    VALUES 
                                        (:cpf, :nome)');
        
        if($stmt->execute([ ':cpf' => $this->cpf, 
                            ':nome' => $this->nome]))
        {
            return true;
        } else
        {
            return false;
        };
    }

    public function update()
    {
        $stmt = $this->prepare('UPDATE 
                                    Usuario
                                SET 
                                    cpf = :cpf, nome =  :nome
                                WHERE
                                    id = :id');
        
        if($stmt->execute([ ':id' => $this->id, 
                            ':cpf' => $this->cpf, 
                            ':nome' => $this->nome]))
        {
            return true;
        } else
        {
            return false;
        };
    }

    public function save() 
    {
        if(empty($this->id)) 
        {
            return $this->insert();
        } else 
        {
            return $this->update();
        }
    }

    public function get(int $id): array
    {
        //
    }

    public function getAll(): array
    {
        $stmt = $this->prepare('SELECT * FROM Usuario');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete()
    {
        if ($this->id) {
            $stmt = $this->prepare('DELETE FROM Usuario WHERE id = :id');

            if ($stmt->execute([':id'=>$this->id])) {
                return true;
            } else {
                return false;
            }   
        } else {
            return false;
        }
    }

}
