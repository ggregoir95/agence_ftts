<?php
/**
 * Created by PhpStorm.
 * User: ggregoir
 * Date: 2018-09-16
 * Time: 14:28
 */

$nomUser = "";

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
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8" />

    <title>Agence Fly to the sky</title>

    <link rel="stylesheet" type="text/css" href="style/global.css" /><!--style global-->
    <link rel="stylesheet" type="text/css" href="style/slide.css" /><!--style slider-->
    <script type="text/javascript" src="script/modernizr.custom.86080.js"></script><!--script slider-->
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
            <input type="submit" name="cat" value="Retour au Catalogue" onclick="cat()">
        </form>
    </div>

<script type="text/javascript">
    function ret($res) {
        <?php unset($tabRes[$res])?>
    }
</script>
</body>
</html>
