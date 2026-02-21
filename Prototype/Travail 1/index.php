<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
if (isset($_GET['action']) && $_GET['action'] == 'reset') {
    $path = "/";
    setcookie("cookie_user", '', time() - 3600, $path);
    setcookie("cookie_color", '', time() - 3600, $path);
    setcookie("cookie_lang", '', time() - 3600, $path);
    setcookie("cookie_last_update_date", '', time() - 3600, $path);

    header('Location: index.php');
    exit;
}
                }
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $expiry = time() + (86400 * 30); 
    $path = "/";

    setcookie("cookie_user", $_POST['nom'], $expiry, $path);
    setcookie("cookie_color", $_POST['couleur'], $expiry, $path);
    setcookie("cookie_lang", $_POST['langue'], $expiry, $path);
    setcookie("cookie_last_update_date", date("Y-m-d H:i:s"), $expiry, $path);

    header('Location: index.php');
    exit;
}
    
$name = $_POST['nom'] ?? $_COOKIE['cookie_user'] ?? 'Guest';
$color = $_POST['couleur'] ?? $_COOKIE['cookie_color'] ?? '#ffffff';
$langue = $_POST['langue'] ?? $_COOKIE['cookie_lang']?? 'france';
$date = $_COOKIE['cookie_last_update_date'] ?? null;


if ($langue === 'france') {
    $lang = [
        'message' => "Bienvenue",
        'name'    => "Nom",
        'date' =>"Dernier mise a jour :" . $date,
        'color'   => "Couleur de fond",
        'langue'  => "Langue", 
        "button"  => "Enregistrer mes choix",
        "reset" => "Reinitialiser tout"
    ];
} else {
    $lang = [
        'message' => "Welcome",
        'name'    => "Name",
        'date' =>"Last update:". $date,
        'color'   => "Background Color",
        'langue'  => "Language", 
        "button"  => "Save my options",
        "reset" => "reset all"
    ];
}


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        display: flex;
        justify-content:center;
        align-items:center;
        background-color:<?php echo $color; ?>;
    }
    .card{
        width: fit-content;
        height:fit-content;
        padding:20px;
        background:white;
        margin:auto;
    }
</style>
<body>
    <div class= "card">
        <h1><?php echo $lang['message'] . " " .$name ; ?></h1>
        <?php if(!empty($date)){
            echo "<h2>".$lang['date']."</h2>";
            }?>
        <form method = 'POST'>
            <label for="nom"><?php echo $lang['name']; ?></label>
            <input type="text" name= 'nom'>
            <label for="couleur"><?php echo $lang['color']; ?></label>
            <input type="color" name= 'couleur'>
            <label for="langue"><?php echo $lang['langue']; ?></label>
            <select name="langue" id="">
                <option value="english">English</option>
                <option value="france">Fransais</option>
            </select>
            <button type="submit"><?php echo $lang['button']; ?></button>
        </form>
        <a  href="?action=reset"><?php echo $lang['reset']; ?></a>
    </div>
</body>
</html>