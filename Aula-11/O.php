<?php


//Open-Close


//EXEMPLO 1


class Frete 
{
    private $empresa;

    public function __construct(string $empresa) 
    {
        $this->empresa = $empresa;
    }

    public function calcular()
    {
        if ($this->empresa == 'Correios') {
            // Lógica
        } else if ($this->empresa == 'JadLog') {
            // Lógica
        } else if ($this->empresa == 'Fedex') {
            // Lógica
        } else {
            return false;
        }
    }
}


// Como refatorar, levando em consideração o princípio de Open-Close


interface EmpresaDeLogistica {
    public function setDados();
    public function getDados();
    //public function calcular();
}

class Frete 
{
    private $empresa;

    public function __construct(EmpresaDeLogistica $empresa) 
    {
        $this->empresa = $empresa->getDados();
    }

    public function calcular()
    {
        // Lógica
    }
}


//EXEMPLO 2


class Negativacao {
    private $devedor;

    public function __construct(Devedor $devedor) 
    {
        $this->devedor = $devedor;
    }

    public function enviar(string $orgaoNegativador) 
    {
        if ($orgaoNegativador == 'Serasa') {
            // Lógica
        } else if ($orgaoNegativador == 'SPC Brasil') {
            // Lgócia
        } else {
            return false;
        }
    }
}


// Como refatorar, levando em consideração o princípio de Open-Close


interface OrgaoNegativador {
    public function enviarRemessaInclusao();
    public function enviarRemessaExclusao();
    public function receberRetorno();
}

class Negativacao {
    private $devedor;

    public function __construct(Devedor $devedor) 
    {
        $this->devedor = $devedor;
    }

    public function enviar(OrgaoNegativador $orgaoNegativador) 
    {
        // Lógica
    }
}