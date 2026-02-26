<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$name = $_SESSION["user"]["name"];
$role = $_SESSION["user"]["role"];

$message = "";

switch ($role) {
    case "administrateur":
        $message = "Welcome Administrator $name";
        break;

    case "formateur":
        $message = "Welcome Trainer $name";
        break;

    case "apprenant":
        $message = "Welcome Student $name";
        break;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Secure Application</h2>

<h3><?= $message ?></h3>

<br>

<a href="logout.php">
    <button>Logout</button>
</a>

</body>
</html>