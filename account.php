<?php
/**
 * Created by PhpStorm.
 * User: ggregoir
 * Date: 2018-09-16
 * Time: 14:28
 */
//$nomUser = "";

if(isset($_SESSION['nomC'])) {
    $nomUser = $_SESSION['nomC'];
}

$tabRes = array();
if (isset($_SESSION['tableReservations'])) {
    $tabRes = $_SESSION['tableReservations'];
}

if(isset($_POST['cat'])) {
    header("Location: catalogue.php");
}

if(isset($_POST['decon'])) {
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 86400, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }
    // Destruction de la session
    session_destroy();
    header("Location: index.php");
}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8" />

    <title>Agence Fly to the sky</title>

    <link rel="stylesheet" type="text/css" href="style/global.css" /><!--style global-->
    <link rel="stylesheet" type="text/css" href="style/slide.css" /><!--style slider-->
    <script type="text/javascript" src="script/modernizr.custom.86080.js"></script><!--script slider-->
    <style>
        body {background-color: #a3bfed};
    </style>
</head>
<body id="page"><!--bannière-->
    <div class="divProfil">
        <h1><?= $nomUser?></h1>
        <ul>
            <?php foreach($tabRes as $res) {
                echo "<li>" . $res . "<input type='button' value='Retirer' onclick='ret($res)'>" . "</li>";
            }?>
        </ul>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <input type="submit" name="cat" value="Retour au Catalogue">
        </form>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <input type="submit" name="decon" value="Deconnexion">
        </form>

    </div>

<script type="text/javascript">
    function ret($res) {
        <?php unset($tabRes[$res])?>
    }
</script>
</body>
</html>
