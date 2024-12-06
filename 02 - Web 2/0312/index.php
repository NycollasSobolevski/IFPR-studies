<?php
require_once "./models/connection.php";
require_once "./models/aluno.php";

$conn = (new DBConnection())->getConnection();
$aluno = new Aluno($conn);
$alunos = $aluno->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Alunos</title>
</head>
<body>
    <h1>Relatório Alunos</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Matricula</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Curso</th>
        </tr>
        <?php foreach ($alunos as $a) : ?>
            <tr>
                <td><?= $a['id'] ?></td> 
                <td><?= $a['matricula'] ?></td> 
                <td><?= $a['nome'] ?></td> 
                <td><?= $a['idade'] ?></td> 
                <td><?= $a['curso'] ?></td>  
            </tr>
        <?php endforeach ?>
        
    </table>
</body>
</html>