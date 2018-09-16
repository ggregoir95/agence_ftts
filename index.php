<?php

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
        <ul class="cb-slideshow">
  <li><span>Image 01</span>
    <div>
      <h3>Les Saintes (Guadeloupe)</h3>
    </div>
  </li>
  <li><span>Image 02</span>
    <div>
      <h3>La caravane du Désert (Maroc)</h3>
    </div>
  </li>
  <li><span>Image 03</span>
    <div>
      <h3>Chien de traineau Vanoise (France)</h3>
    </div>
  </li>
</ul>
        <div class="container">
         <!--MENU-->
            <header>
                <input type="button" id="compte" name="compte" value="Votre Compte" onclick="redirCpt()">
				<p class="menu">
					
					<a href="<?php echo $_SERVER['PHP_SELF'], '?login=1' ?>" class="current-page">Connexion</a>
					<a href="<?php echo $_SERVER['PHP_SELF'], '?inscription=1' ?>">Inscription</a>
					
				</p>
            </header>

            <?php if(isset($_GET['login'])) {
                    if($_GET['login'] == 1) {
                        require_once('connexion.php');
                    }
            }?>
        </div>
    <script type="text/javascript">
        function redirCpt() {
            <?php if(isset($_SESSION['contd'])) {?>
                location.href = "account.php";
            <?php } else {?>
                location.href = "<?php echo $_SERVER['PHP_SELF'], '?login=1' ?>";
            <?php }?>
        }
    </script>
    </body>
</html>

