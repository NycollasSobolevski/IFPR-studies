<?php 
    include '../model/Funcionario.class.php'; 
    session_start();

    if(!isset($_SESSION['funcList'])){
        $_SESSION['funcList'] = [];
    }

    if($_SERVER['REQUEST_METHOD']==='POST'){ 
        $func = new Funcionario(
            $_POST['matricInput'],
            $_POST['nameInput'],
            $_POST['docInput'],
            $_POST['depInput']
        );

        $_SESSION['funcList'][] = $func;
    }
    $listFunc = $_SESSION['funcList'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionarios</title>
    <link rel="stylesheet" href="./public/style.css">
    <link rel="stylesheet" href="./public/index.css">
</head>
<body>
    <header>
        <span><h1>Lista de Funcionarios</h1></span>
    </header>


    <main>
        <form class="table-header align" action="" method="post">
            <div class="inputs-container">
                <input type="text" name="matricInput" placeholder="Matricula">
                <input type="text" name="nameInput" placeholder="Nome">
                <input type="text" name="docInput" placeholder="Documento">
                <input type="text" name="depInput" placeholder="Departamento">
            </div>
            <span>
                <button type="submit" class='align'><h2>+</h2>Add Funcionario</button>
            </span>
        </form>

        <table>
            <tr>
                <th>Nome</th>
                <th>Matricula</th>
                <th>Documento</th>
                <th>Departamento</th>
            </tr>
            <?php foreach ($listFunc as $obj) { ?>
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