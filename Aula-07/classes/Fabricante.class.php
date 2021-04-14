<?php

require(__DIR__ . '/../interfaces/iFabricante.interface.php');

require_once(__DIR__ . '/abstratas/TipoPessoa.class.php');

class Fabricante extends TipoPessoa implements iFabricante
{  
    public function set(array $dados): bool
    {
        //
    }

    public function get(int $id): array
    {
        //
    }
}
