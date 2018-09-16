<?php
/**
 * Created by PhpStorm.
 * User: ggregoir
 * Date: 2018-09-16
 * Time: 14:28
 */

$nomUser = $_SESSION['nomC'];
if (isset($_SESSION['tableReservations'])) {
    $tabRes = $_SESSION['tableReservations'];
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

        <input type="button" value="Retour au Catalogue" onclick="cat()">
    </div>

<script type="text/javascript">
    function ret($res) {
        <?php unset($tabRes[$res])?>
    }
    function cat() {
        window.location.href = 'catalogue.php';
    }
</script>
</body>
</html>
