<?php

interface iQuestionario
{
    public function definePergunta(): void;
    public function setaAlternativaEscolhida(): void;
    public function verificaSeCorreto(): boolean;
}



class Pergunta implements iQuestionario
{
    protected $enunciado;
    protected $alternativas;
    protected $alternativaCorreta;
    protected $alternativaEscolhida;

    public function definePergunta($enunciado, $alternativas, $alternativaCorreta): void
    {
        $this->enunciado = $enunciado;
        $this->alternativas = $alternativas;
        $this->alternativaCorreta = $alternativaCorreta;
    }

    public function imprimePergunta(): void 
    {
        echo($this->enunciado);
        echo($this->alternativas);
    }

    public function setaAlternativaEscolhida($alternativaSetada): void 
    {
        $this->alternativaEscolhida = $alternativaSetada;
    }

    public function exibeAlternativaCorreta() {
        echo($this->alternativaCorreta . "\n");
    }

    public function verificaSeCorreto(): boolean
    {
        if ($alternativaEscolhida === $alternativaCorreta) {
            return true;
        } else {
            return false;
        }
    }
}

/*
    $pergunta1 = new Pergunta;

    $pergunta1->definePergunta("Qual o coletivo de cães? \n", "A) Matilha \n B) Rebanho \n C) Alcateia \n D) Manada \n", "A");

    $pergunta1->imprimePergunta();
*/

class PerguntaMatematica extends Pergunta
{
    public function calculaSoma($a, $b): void 
    {
        $this->alternativaCorreta = $a + $b;
    }
}

$pergunta2 = new PerguntaMatematica;

/*
    $pergunta2->definePergunta(
        "Quanto é 24852 + 245465? \n", 
        "A) 270317 \n B) 270318 \n C) 270319 \n D) 270320 \n", 
        "");

    $pergunta2->calculaSoma(24852, 245465);

    $pergunta2->exibeAlternativaCorreta();
*/