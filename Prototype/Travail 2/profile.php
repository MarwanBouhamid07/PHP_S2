<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['pass'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1><?php echo "welcome ".  $_SESSION['username'];?></h1>
    <a href="deconnexion.php">logout</a>
</body>
</html>