<?php


$name = $_POST['nom'] ?? $_COOKIE['cookie_user'];
$date = $_COOKIE['cookie_last_update_date'];
$color = $_POST['couleur'] ?? $_COOKIE['cookie_color'] ?? '#ffffff';
$langue = $_POST['langue'] ?? $_COOKIE['cookie_lang']?? 'france';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    setcookie("cookie_user",$_POST['nom']);
    setcookie("cookie_color",$_POST['couleur']);
    setcookie("cookie_lang",$_POST['langue']);
    setcookie("cookie_last_update_date",date("Y-m-d H:i:s"));
    

header('Location: index.php');
        exit;
    
}

if ($langue === 'france') {
    $lang = [
        'message' => "Bienvenue",
        'name'    => "Nom",
        'date' =>"Dernier mise a jour :" . $date,
        'color'   => "Couleur de fond",
        'langue'  => "Langue", 
        "button"  => "Enregistrer mes choix"
    ];
} else {
    $lang = [
        'message' => "Welcome",
        'name'    => "Name",
        'date' =>"Last update:". $date,
        'color'   => "Background Color",
        'langue'  => "Language", 
        "button"  => "Save my options"
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
    </div>
</body>
</html>