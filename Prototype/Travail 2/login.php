<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user === 'user' && $pass === '1234') {
        $_SESSION['username'] = $user;
        $_SESSION['pass'] = $pass;
        header("Location: profile.php");
        exit;
        echo "LOGIN OK";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form method="POST">
        <label for="username">Username :</label>
        <input type="text" name="username">
        <label for="pass">Password :</label>
        <input type="password" name="password">
        <button type="submit">submit</button>
    </form>
</body>
</html>