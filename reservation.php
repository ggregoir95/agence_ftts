<?php


$firstName = $lastName = $email = $phone = $date = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $date = test_input($_POST["date"]);
    $address = test_input($_POST["address"]);

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['reserver'])) {
// define variables and set to empty values

    if(isset($_POST['reserver'])) {
        array_push($_SESSION['tableReservations'], $_POST['nomForf']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style/global.css" charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style/global.css"/>

</head>
<body id="page" class="interne">

<div class="container">
    <header>
        <p class="menu"><a href="index.php">Accueil</a> <a href="catalogue.php" class="current-page">Nos forfaits</a>
        </p>
    </header>
    <div class="page-content">
        <h2>Formulaire de réservation</h2>
        <h3 id="nom-forfait" class="nom-forfait"></h3>
                De <span id="debut-saison" class="debut-saison"></span> à <span id="fin-saison"
                                                                                class="fin-saison"></span>
                <form id="myForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <input type="hidden" id="nomForf" name="nomForf" />
                    <label class="form_col" for="lastName">Nom :</label>
                    <input name="lastName" id="lastName" type="text" placeholder=""/>
                    <span class="tooltip">Un nom ne peut pas faire moins de 2 caractères</span> <br/>
                    <br/>
                    <label class="form_col" for="firstName">Prénom :</label>
                    <input name="firstName" id="firstName" placeholder="" type="text"/>
                    <span class="tooltip">Un prénom ne peut pas faire moins de 2 caractères</span> <br/>
                    <br/>
                    <label class="form_col" for="email">Email :</label>
                    <input name="email" id="email" placeholder="exemple@exemple.com" type="text"/>
                    <span class="tooltip">Ce n'est pas une adresse mail valide</span> <br/>
                    <br/>
                    <label class="form_col" for="phone">Numéro de téléphone :</label>
                    <input name="phone" id="phone" type="text" placeholder="(xxx) xxx-xxxx"/>
                    <span class="tooltip">Le numéro de téléphone est invalide</span> <br/>
                    <br/>
                    <label class="form_col" for="address">Adresse :</label>
                    <input placeholder="Adresse" name="address" id="address" type="text"/>
                    <span class="tooltip">L'adresse ne doit pas faire moins de 10 caractères</span> <br/>
                    <br/>
                    <label class="form_col" for="date">Date :</label>
                    <input name="date" id="date" placeholder="(jj-mm-aaaa)" type="text"/>
                    <span class="tooltip">La date n'est pas valide (jj-mm-aaaa) ou bien elle n'est pas postérieure à la date courante ou elle n'est pas comprise dans la période de validité du forfait.</span>
                    <br/>
                    <br/>
                    <label class="form_col" for="date">Nombre de participants :</label>
                    <input name="participants" id="participants" placeholder="0" type="number"/>
                    <span class="tooltip">Le nombre doit etre positif, supérieur ou égal à 1</span> <br/>
                    <br/>
                    <div class='total'>
                        <label class="tatal_col">Total :</label>
                        <span id="total"><b>0 €<b/></span></div>
                    <br/>
                    <span class="form_col"></span>
                    <input type="submit" id="submitme" name="reserver" value="Réserver"/>
                </form>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="script/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="script/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="script/forfaits.js"></script>
<script type="text/javascript" src="script/formulaire.js"></script>
</body>
</html>
