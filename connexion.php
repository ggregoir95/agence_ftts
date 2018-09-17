<?php

/**
 * Created by PhpStorm.
 * User: ggregoir
 * Date: 2018-09-16
 * Time: 10:03
 */
require('requetes.php');

if(array_search('oui', $_SESSION['contd'])) {
    header('Location: catalogue.php');
}
if(isset($_POST['courriel'])) {
    $users = mysqli_query($conn, $selectUsers);
    $uname = $_POST['courriel'];
    $passw = md5($_POST['pwd']);

    while($row = mysqli_fetch_assoc($users)) {
        if($row['email'] == $uname) {
            if($row['pword'] == $passw) {
                $_SESSION['contd'] = "oui";
                $_SESSION['nomC'] = $row['fname'] . " " .  $row['lname'];

                var_dump($_SESSION['nomC']);
                header("Location: catalogue.php");
            }
            else {
                function alert($msg) {
                    echo "<script type='text/javascript'>alert('$msg');</script>";
                }
                alert("Mot de Passe Incorrect");
            }
        } else {

            function alert($msg) {
                echo "<script type='text/javascript'>alert('$msg');</script>";
            }
            alert("Courriel Incorrect");
        }
    }

}

?>

<div class="connect">
    <form method="post" action="<?= $_SERVER["PHP_SELF"] . "?login=1"?>">
        <label for="email">Entrez votre Courriel</label><br />
        <input type="text" name="courriel" id="email"><br />
        <label for="pwd">Entrez votre mot de passe</label><br />
        <input type="password" name="pwd" id="pwd">
        <input type="submit" value="Connection">
    </form>
</div>