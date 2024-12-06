<?php

class Aluno 
{
    private $id;
    private $matricula;
    private $nome;
    private $idade;
    private $curso;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function setAluno($matricula, $nome, $idade, $curso){
        $this->matricula = $matricula;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->curso = $curso;
    }

    public function save() {
        $sql = "Insert into alunos (matricula, nome, idade, curso) values (:matricula, :nome, :idade, :curso)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':curso', $this->curso);
        $stmt->execute();
    }

    public function update($id) {
        $sql = "update alunos set matricula = :matricula, nome = :nome, idade = :idade, curso = :curso WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':curso', $this->curso);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function delete($id) {
        $sql = "delete from alunos where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function getAll( ) {
        $sql = "select * from alunos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "select * from alunos where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>