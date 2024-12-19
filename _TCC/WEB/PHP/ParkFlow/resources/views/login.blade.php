<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkFlow - Login</title>

    @vite([
        'resources/css/login.css',
        'resources/css/app.css', 
        'resources/js/app.js'
    ])

</head>
<body>
    <header>
        <a class="logo-container" href="/">
            <img src="/img/logo.png" alt="logo.png" width="30">
            <img src="/img/extended_logo.svg" alt="extendedLogo" width="100">
        </a>
    </header>
    <main>
        <div class="login-container">
            <h1>LOGIN</h1>
            <form action="" method="post">
                <div class="input-container">
                    <input type="text" id="identification" required>
                    <label for="identification">Email / Document</label>
                </div>
            </form>
        </div>
    </main>
</body>
</html>