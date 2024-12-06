<?php
    include '../model/Database.php';

    $db = new Database("localhost", "root", "", "ifpr");
    $connection = $db->getConnection();

    // $connection = mysqli_connect("localhost", "root", "", "ifpr") or die ("Não foi possível conectar ao banco de dados" . mysqli_connect_error());


?>