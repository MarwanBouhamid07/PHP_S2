<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
if (isset($_GET['action']) && $_GET['action'] == 'reset') {
    $path = "/";
    setcookie("cookie_user", '', time() - 3600, $path);
    setcookie("cookie_color", '', time() - 3600, $path);


    header('Location: index.php');
    exit;
}
                }
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $expiry = time() + (86400 * 30); 
    $path = "/";

    setcookie("cookie_user", $_POST['nom'], $expiry, $path);
    setcookie("cookie_color", $_POST['color'], $expiry, $path);
    setcookie("cookie_langue", $_POST['langue'], $expiry, $path);
    


    header('Location: index.php');
    exit;
}
    
$name = $_POST['nom'] ?? $_COOKIE['cookie_user'] ?? 'Guest';
$color = $_POST['color'] ?? $_COOKIE['cookie_color'] ?? '#ffffff';
$langue = $_POST['langue'] ?? $_COOKIE['cookie_langue'] ?? 'english';
$lang = [];

if ($langue == "english") {
    $lang = [
        'title' => 'welcome',
        'name' => 'name',
        'color' => 'color',
        'langue' => 'language',
        'button' => 'submit',
    ];
}else{
    $lang = [
        'title' => 'Beinvenu',
        'name' => 'nom',
        'color' => 'couleur',
        'langue' => 'langue',
        'button' => 'envoyer',
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
            background-color:<?php echo $color;?>;
        }
    </style>
<body>
    <div class= "card">
        <h1> <?php echo $lang['title'] ." ". $name ; ?> </h1>
        <form method = 'POST'>
            <label for="nom"><?php echo $lang['name'] ?></label>
            <input type="text" name= 'nom'>
            <label for="couleur"><?php echo $lang['color'] ?></label>
            <input type="color" name= 'color' value= "<?php echo $color ; ?>" >
            <label for="langue"><?php echo $lang['langue'] ?></label>
            <select name="langue" >
                <option value="english" <?php  echo ($langue === "english") ? "selected" : ""  ?>>English</option>
                <option value="france"  <?php  echo ($langue ==="france") ? "selected" : "" ?>>Fransais</option>
            </select>
            <button type="submit"><?php echo $lang['button'] ?></button>
        </form>
        <a  href="?action=reset">reset</a>
    </div>
</body>
</html>