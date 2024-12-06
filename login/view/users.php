<?php 
    include '../model/Funcionario.class.php'; 
    include '../config/db.php';

    $getQery  = mysqli_query($connection, 'select * from users');
    $users = mysqli_num_rows($getQery);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudantes</title>
    <link rel="stylesheet" href="./public/style.css">
    <link rel="stylesheet" href="./public/index.css">
</head>
<body>
    <header>
        <span><h1>Lista de Estudantes</h1></span>
    </header>


    <main>
        <form class="table-header align" action="../controllers/addFuncionario.php" method="post">
            <div class="inputs-container">
                <input type="text" name="matricInput" placeholder="Matricula">
                <input type="text" name="nameInput" placeholder="Nome">
                <input type="text" name="docInput" placeholder="Documento">
                <input type="text" name="depInput" placeholder="Turma">
            </div>
            <span>
                <button type="submit" class='align'><h2>+</h2>Add Estudante</button>
            </span>
        </form>

        <table>
            <tr>
                <th>Nome</th>
                <th>Matricula</th>
                <th>Documento</th>
                <th>Turma</th>
            </tr>
            <?php while ($crr = mysqli_fetch_array($getQery)) { 
                $obj = new Funcionario(
                    $crr['register'], 
                    $crr['name'],
                    $crr['document'],
                    $crr['department']
                );
            ?>
                <tr>
                    <td><?php echo $obj->getNome() ?></td>
                    <td><?php echo $obj->getMatricula() ?></td>
                    <td><?php echo $obj->getDocument() ?></td>
                    <td><?php echo $obj->getDepartamento() ?></td>
                </tr>
            <?php }?>
        </table>
    </main>
    <?php 


    ?>
</body>
</html>