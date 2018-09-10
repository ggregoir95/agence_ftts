"use strict";

//on récupère l'id et on cherche l'objet forfait correspendant
var split = location.search.replace('?', '').split('=');// ICI on récupére l'id envoyé dans l'url, split[1] est l'id recherché
var offre_correspondant; // variable dans laquelle on va mettre notre objet forfait
for (var i=0; i<forfaits_data.length; i++) {
  if(forfaits_data[i].id === split[1]) {
      offre_correspondant = forfaits_data[i];
  }
}
var peopleNumber;
var total;
var startDate;
var prixTotal;
if(offre_correspondant) {
  $('#nom-forfait').html(offre_correspondant.nom);
  $('#debut-saison').html(offre_correspondant.debut_saison);
  $('#fin-saison').html(offre_correspondant.fin_saison);
}

// Fonction de désactivation de l'affichage des "tooltips"
function deactivateTooltips() {

    var tooltips = document.querySelectorAll('.tooltip'),
        tooltipsLength = tooltips.length;

    for (var i = 0; i < tooltipsLength; i++) {
        tooltips[i].style.display = 'none';
    }

}

// La fonction ci-dessous permet de récupérer la "tooltip" qui correspond à notre input

function getTooltip(elements) {

    while (elements = elements.nextSibling) {
        if (elements.className === 'tooltip') {
            return elements;
        }
    }

    return false;

}


// Fonctions de vérification du formulaire, elles renvoient "true" si tout est ok

var check = {}; // On met toutes nos fonctions dans un objet littéral

check['lastName'] = function(id) {

    var name = document.getElementById(id),
        tooltipStyle = getTooltip(name).style;

    if (name.value.length >= 2) {
        name.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        name.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['firstName'] = check['lastName']; // La fonction pour le prénom est la même que celle du nom

check['email'] = function() {

    var email = document.getElementById('email'),
        tooltipStyle = getTooltip(email).style,
        emailValue = email.value;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var isEmailCorrect = emailReg.test(emailValue);
        if(emailValue && isEmailCorrect) {
            email.className = 'correct';
            tooltipStyle.display = 'none';
            return true
        } else {
            email.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }
};

check['phone'] = function() {

    var phone = document.getElementById('phone'),
        tooltipStyle = getTooltip(phone).style,
        phoneReg = /(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{2})\-[0-9]{2}/,
        isPhoneCorrect = phoneReg.test(phone.value);

    if (phone.value && isPhoneCorrect) {
        phone.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        phone.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }
};

check['address'] = function() {

    var address = document.getElementById('address'),
        tooltipStyle = getTooltip(address).style;

    if (address.value.length >= 10) {
        address.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        address.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['date'] = function() {

        var date = document.getElementById('date'),
        dateReg = /\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/,
        tooltipStyle = getTooltip(date).style,
        isDateCorrect = dateReg.test(date.value);

        var start = offre_correspondant.debut_saison.split("-"); //split("-") retourne un tableau des éléments entre les "-" par exemple "10/11/13".split("-") retourne [10,11,13]
        var end = offre_correspondant.fin_saison.split("-");
        var dateToCheck = date.value.split("-");

        var today = new Date(); // la date d'aujourd'hui
        var from = new Date(start[2], parseInt(start[1])-1, start[0]);  // -1 car les mois sont entre 0 et 11
        var to   = new Date(end[2], parseInt(end[1])-1, end[0]);
        var check = new Date(dateToCheck[2], parseInt(dateToCheck[1])-1, dateToCheck[0]);

        var isDateBetweenPeriod = from > today ? check >= from && check < to : check >= today && check < to; // un peut difficile à lire mais optimal et le principe est simple: a ? b : c c'est à dire si a est vrai alors b si non c.

    if (date.value && isDateCorrect && isDateBetweenPeriod) {
        startDate = date.value;
        date.className = 'correct';
        tooltipStyle.display = 'none';
        return true;
    } else {
        date.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};

check['participants'] = function() {

    var participants = document.getElementById('participants'),
        tooltipStyle = getTooltip(participants).style;

    if (Number(participants.value) > 0) {
        participants.className = 'correct';
        tooltipStyle.display = 'none';
        peopleNumber = Number(participants.value);
        return true;
    } else {
        participants.className = 'incorrect';
        tooltipStyle.display = 'inline-block';
        return false;
    }

};
$(function(ready){
    $('#participants').change(function() {
      var participants =  document.getElementById('participants')
      if(Number(participants.value)>=0) {
        prixTotal = Number(participants.value)*offre_correspondant.prix;
        $('#total').html("<b>"+Number(participants.value)*offre_correspondant.prix+" €</b>");
      }
    });
});

// Mise en place des événements

(function() { // Utilisation d'une IIFE pour éviter les variables globales.

    var myForm = document.getElementById('myForm'),
        inputs = document.querySelectorAll('input[type=text], input[type=number]'),
        inputsLength = inputs.length;

    myForm.addEventListener('submit', function(e) {
      e.preventDefault();

        var result = true;

        for (var i in check) {
            result = check[i](i) && result;
        }

        for (var i = 0; i < inputsLength; i++) {
            inputs[i].addEventListener('keyup', function(e) {
                check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
                console.log(check[e.target.id])
            });
        }

        if (result) {

          $("#submitme").fancybox ({
            content : "<h3 style='text-align:center; margin-bottom: 10px;'>CONFIRMATION</h3><div style='width:500px; border: 1px solid black;'><div style='margin: 10px;'>- "+peopleNumber+" forfaits '"+offre_correspondant.nom+"'.</div><div style='margin: 10px;'>- Début séjour le"+startDate+ "</div><div style='margin: 10px;'>- Prix total: <b>"+prixTotal+"€ </b></div></div><div><a style='margin-top:10px;'class='btn-reserver' href='index.html'>Confirmer</a></div>"
          });
          document.getElementById('submitme').click();

      }


    });

})();


// Maintenant que tout est initialisé, on peut désactiver les "tooltips"
deactivateTooltips();
