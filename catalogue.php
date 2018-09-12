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
	// parcour de tableau des catégorie existant dans le fichier forfaits.js
    for(var i = 0; i < categories.length; i++){ 
	//concatiner les catégories (sous forme HTML)
        printCateg += "<li><a href='#' class='"+[i]+"'>"+categories[i]+"</li></a>";  
    }
    return printCateg; // <-- à afficher
}
document.getElementById('filterOptions').innerHTML = categList(); //afficher l'element ayant l'ID filterOptions

//liste des forfaits
function forfaitList(){   

    var printForfait = "";
	// parcour de tableau des forfaits existant dans le fichier forfaits.js
    for(var j = 0; j < forfaits_data.length; j++){
	//collecter les infos de chaque forfaits (sous forme HTML)
        printForfait += "<div class='item "+forfaits_data[j]['categorie']+"'><img class='img-responsive' src="+forfaits_data[j]['img_catalogue']+"'images/forfaits/' alt='"+forfaits_data[j]['nom']+"' /><h3>"+forfaits_data[j]['nom']+"</h3><div class='prix'>"+forfaits_data[j]['prix']+" £</div><a class='fancybox link' href='#inline"+forfaits_data[j]['id']+"'>test</a></div><div id='inline"+forfaits_data[j]['id']+"' style='max-width:750px;display: none;'><h3>"+forfaits_data[j]['nom']+"</h3><div class='prix'>"+forfaits_data[j]['prix']+" £</div><div class='contenu'>"+forfaits_data[j]['duree']+" jours de "+forfaits_data[j]['debut_saison']+" à "+forfaits_data[j]['fin_saison']+"<br>"+forfaits_data[j]['lieu']+"<br>"+forfaits_data[j]['infos']+"<br>"+forfaits_data[j]['hebergement']+"<br>"+forfaits_data[j]['niveau']+"<br></div><a class='btn-reserver' href="+forfaits_data[j]['id']+"'reservation.php?id='>Reserver</a></div>";


    }
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