"use strict";

    // Ce que j'ai fait ici est juste pour afficher les nom des forfaits avec redirection vers la bonne page de réservation
    var htmTodisplay = "";
    for(var i=0; i<forfaits_data.length; i++) {
        htmTodisplay = htmTodisplay + "<div><a href='reservation.html?id="+forfaits_data[i].id+"'>"+forfaits_data[i].nom+"</a></div>"
    }
    $('#display-forfait').html(htmTodisplay)
