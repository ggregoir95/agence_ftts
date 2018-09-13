<?php
/**
 * Created by PhpStorm.
 * User: mniang1
 * Date: 13/09/2018
 * Time: 11:00
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d' Inscription</title>
    <link rel="stylesheet" href="style/global.css" charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style/global.css" />

</head>
<body id="page" class="interne">

<div class="container">
    <header>
        <p class="menu"> <a href="index.php">Accueil</a> <a href="catalogue.php" class="current-page">Nos forfaits</a></p>
    </header>
    <div class="page-content">
        <h2>Inscription</h2>
        <h3 id="incription" class=incription>
            <h3>
                <form id="myFormInsc" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label class="form_col" for="lastName">Nom :</label>
                    <input name="lastName" id="lastName" type="text" placeholder=""/>
                    <br />
                    <label class="form_col" for="firstName">Prénom :</label>
                    <input name="firstName" id="firstName" placeholder="" type="text" />
                    <br />
                    <label class="form_col" for="email">Email :</label>
                    <input name="email" id="email" placeholder="exemple@exemple.com" type="email" />
                    <br />
                    <label class="form_col" for="password">Mot de passe :</label>
                    <input name="password" id="password" placeholder="" type="password" />
                    <br />
                    <br />
                    <br />
                    <br />

                    <input type="submit" id="submitme" value="Inscrire" />
                </form>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="script/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="script/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="script/forfaits.js"></script>
<script type="text/javascript" src="script/formulaire.js"></script>
</body>
</html>

