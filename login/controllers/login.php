<?php

    $login = $_POST["ILogin"];
    $pass = $_POST["IPass"];

    include_once('../config/db.php');

    $command = "SELECT * FROM access WHERE login = '$login' AND hash = '$pass'";

    $querry  = mysqli_query($connection, $command) or die ("Error on login" . mysql_error());

    if($reg = mysqli_fetch_assoc($querry)) {
        $name = $reg["name"];
        session_start();
        $_SESSION["login"] = $login;
        $_SESSION["name"] = $name;

        header("Location:../view/users.php");
    } else {
        header("Location:../index.php?erro='Login invalido!'");
    }

?>