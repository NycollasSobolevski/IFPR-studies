<?php

class Funcionario
{
    private $matricula = 0;
    private $nome = null;
    private $rg = null;
    protected $departamento = null;

    public function __construct($matricula, $nome, $doc, $dep){
        $this->matricula = $matricula;
        $this->nome = $nome;
        $this->rg = $doc;
        $this->departamento = $dep;

    }

    public function getMatricula() {
        return $this->matricula;
    }
    public function setMatricula($value) {
        return $this->matricula = $value;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($value) {
        return $this->nome = $value;
    }
    public function getDocument() {
        return $this->rg;
    }
    public function setDocument($value) {
        return $this->rg = $value;
    }
    public function getDepartamento() {
        return $this->departamento;
    }
    public function setDepartamento($value) {
        return $this->departamento = $value;
    }

}


?>