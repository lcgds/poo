<?php

interface iUsuario
{
    public function set(array $dados): bool;
    public function get(int $id): array;
}
