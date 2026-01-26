<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    <?php
        if(isset($_SESSION["admin_email"])){
            header("Location: brands/index.php");
        }
    ?>
    <form method="POST" action="login/login.php">
        Email: <input type="email" name="email"><br>
        Password: <input type="password" name="password"><br>
        <button>Login</button>
    </form>
</body>
</html>