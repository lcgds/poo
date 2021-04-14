<?php

require(__DIR__ . '/../interfaces/iUsuario.interface.php');

require_once(__DIR__ . '/abstratas/TipoPessoa.class.php');

class Usuario extends TipoPessoa implements iUsuario
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
