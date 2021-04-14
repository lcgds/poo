<?php

interface iMovimentacao
{
    public function set(array $dados): bool;
    public function get(int $id_usuario, string $dataHora): array;
}
