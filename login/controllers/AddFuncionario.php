<?php 
    include '../model/Funcionario.class.php';
    include_once('../config/db.php');

    $new = new Funcionario(
        $_POST['matricInput'], 
        $_POST['nameInput'],
        $_POST['docInput'],
        $_POST['depInput']
    );


    $command = $new->getInsertString('users');

    $query = mysqli_query($connection, $command);

    if(!$query) {
        echo 'Problema ao salvar usuário';
        echo '<meta http-equiv="refresh" 
            content="10;URL=../views/users.php"/>';
        return;
    }

    mysqli_close($connection);

    echo '<meta http-equiv="refresh" 
        content="1;URL=../view/users.php"/>';

?>