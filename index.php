<?php
session_start();
$_SESSION['tableReservations'] = array();

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['compte'])) {
    if(isset($_SESSION['contd'])) {
        header("Location: account.php");
    }
    else {
        header("Location: index.php?login=1");
    }
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
                <form method="post" class="compte" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <input type="submit" name="compte" value="Votre Compte">
                </form>
				<p class="menu">
					
					<a href="<?php echo $_SERVER['PHP_SELF'], '?login=1' ?>" class="current-page">Connexion</a>
					<a href="<?php echo $_SERVER['PHP_SELF'], '?inscription=1' ?>">Inscription</a>
					
				</p>
            </header>

            <?php if(isset($_GET['login'])) {
                    if($_GET['login'] == 1) {
                        require_once('connexion.php');
                        $_SESSION['nbRes'] = 0;
                    }
                }

                if(isset($_GET['inscription'])) {
                    require_once('inscription.php');
                    $_SESSION['nbRes'] = 0;
                }?>
        </div>
    <script type="text/javascript">
        function redirCpt() {

        }
    </script>
    </body>
</html>

