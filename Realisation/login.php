<?php
session_start();


$users = [

    [
        "name" => "Ahmed",
        "password" => "admin123",
        "role" => "administrateur",
        "active" => true
    ],
    [
        "name" => "Sara",
        "password" => "pass456",
        "role" => "formateur",
        "active" => true
    ],
    [
        "name" => "Leila",
        "password" => "test789",
        "role" => "apprenant",
        "active" => false
    ],
    [
        "name" => "Alae",
        "password" => "test309",
        "role" => "apprenant",
        "active" => true
    ]
];

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["name"] ?? "";
    $password = $_POST["password"] ?? "";

    $userFound = false;

    foreach ($users as $user) {

        if ($user["name"] === $username &&
            $user["password"] === $password) {

            $userFound = true;

    
            if (!$user["active"]) {
                $message = "Account disabled";
                break;
            }


            $_SESSION["user"] = [
                "name" => $user["name"],
                "role" => $user["role"]
            ];

            header("Location: dashboard.php");
            exit;
        }
    }

    if (!$userFound) {
        $message = "Incorrect credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Authentication Page</h2>

<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<p style="color:red;">
    <?= $message ?>
</p>

</body>
</html>