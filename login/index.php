<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form action="./controllers/login.php" method="post" name="formLogin" id="login" class="align">

        <h1>Users Access</h1>

        <?php
            if( isset( $_GET["erro"] ) ){
                $erro = $_GET["erro"];
                echo "<CENTER><FONT color='red'> $erro </FONT> </CENTER>";
            }
        ?>

        <table class="align">
            <tr class="align">
                <th>Login</th>
                <td><input type="text" name="ILogin" required></td>
            </tr>
            <tr class="align">
                <th>Password</th>
                <td><input type="password" name="IPass" required></td>
            </tr>
        </table>
        <span class="btn-container align">
            <input type="submit" value="Login">
            <input type="reset" value="Clear">
        </span>

    </form>

</body>
</html>