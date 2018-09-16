<?php
require('requetes.php');

$categories = mysqli_query($conn, $selectCategs);
$destinations = mysqli_query($conn, $selectDestinations);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Agence Fly to the sky</title>
</head>
<body id="page" class="interne">
<div class="container">
    <!--MENU-->
    <header>
        <p class="menu"> <a href="index.php">Accueil</a> <a href="catalogue.php" class="current-page">Nos forfaits</a> </p>
    </header>
    <!--FILTRE-->
    <!--Catégorie-->
    <ul id="filterOptions">
    </ul>
    <!--Forfaits-->
    <div id="ourHolder"> </div>
</div>
<link rel="stylesheet" type="text/css" href="style/global.css" />
<script type="text/javascript" src="script/forfaits.js"></script>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="script/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="script/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="script/jquery.fancybox.css" media="screen" />
<script type="text/javascript">

    $(document).ready(function() {
        //liste des catégories
        function categList(){
            var printCateg = "";
            <?php if (mysqli_num_rows($categories) > 0) {
            $i = 0;
            while($row = mysqli_fetch_assoc($categories)) {?>
            //concatiner les catégories (sous forme HTML)
            printCateg += "<li><a href='#' class='<?=$i;?>'><?=$row['nomCategorie'];?></li></a>";
            <?php $i++;
            }}?>
            return printCateg; // <-- à afficher
        }
        document.getElementById('filterOptions').innerHTML = categList(); //afficher l'element ayant l'ID filterOptions

//liste des forfaits
        function forfaitList(){
            var printForfait = "";
            <?php if (mysqli_num_rows($destinations) > 0) {
            while($row2 = mysqli_fetch_assoc($destinations)) {
            ?>
            //collecter les infos de chaque forfaits (sous forme HTML)
            printForfait += "<div class='item <?=$row2['idCategorie']?>'><img class='img-responsive' src='images/forfaits/<?=$row2['img_catalogue']?>' alt='<?=$row2['nom']?>' /><h3><?=$row2['nom']?></h3><div class='prix'><?=$row2['prix']?> £</div><a class='fancybox link' href='#inline<?=$row2['id']?>'>test</a></div><div id='inline<?=$row2['id']?>' style='max-width:750px;display: none;'><h3><?=$row2['nom']?></h3><div class='prix'><?=$row2['prix']?> £</div><div class='contenu'><?=$row2['duree']?> jours de <?=$row2['debut_saison']?> à <?=$row2['fin_saison']?><br><?=$row2['lieu']?><br><?=$row2['infos']?><br><?=$row2['hebergement']?><br><?=$row2['niveau']?><br></div><a class='btn-reserver' href=<?=$row2['id']?>'reservation.php?id='>Reserver</a></div>";
            <?php }}
            ?>
            return printForfait; // <-- à afficher
        }
document.getElementById('ourHolder').innerHTML = forfaitList();//afficher l'element ayant l'ID ourHolder
/*-------------------------------------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------------------------------------*/
	
	//Fonction de Filtre
	$('#filterOptions li a').click(function() {
		// fetch the class of the clicked item
		var ourClass = $(this).attr('class');

		// reset the active class on all the buttons
		$('#filterOptions li').removeClass('active');
		// update the active state on our clicked button
		$(this).parent().addClass('active');

		if(ourClass == 'all') {
			// show all our items
			$('#ourHolder').children('div.item').show();
		}
		else {
			// hide all elements that don't share ourClass
			$('#ourHolder').children('div:not(.' + ourClass + ')').hide();
			// show all elements that do share ourClass
			$('#ourHolder').children('div.' + ourClass).show();
		}
		return false;
	});

//fonction de popup
			$('.fancybox').fancybox();

		});
	</script>
</body>
</html>
