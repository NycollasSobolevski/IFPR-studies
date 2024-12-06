<?php
require_once '../../models/aluno.php';
require_once '../../models/connection.php';

$conn = (new DBConnection())->getConnection();
$aluno = new Aluno($conn);

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $aluno->setAluno($_POST['matricula'],$_POST['nome'],$_POST['idade'],$_POST['curso']);
    $aluno->save();
    echo "aluno cadastrado com sucesso!";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">  
        Matricula: <input required type="text" name="matricula" /><br>
        Nome: <input required type="text" name="nome" /><br>
        Idade: <input required type="number" name="idade" /><br>
        Curso: <input required type="text" name="curso" /><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>