<?php
// CONFIGURATION
setlocale(LC_ALL,'fr_FR','fra');        //Locale (langue pour la date etc.)
define('DSN','sqlite:database/db');     //Adresse de connexion à la BDD.

// INCLUDES
require "database/model.php";           //Le modèle (base de donnée)
require "controllers/functions.php";    //Les fonctions communes

// AFFICHAGE DE LA PAGE (ROUTE)

//Liste des pages autorisées
$authorized_pages = [
    'showpost',
    'showposts',
    'addcomment',
    'editpost',
    'admin',
];

//Si on a le paramètre page ET qu'elle fait partie des pages autorisées...
if (isset($_GET['page']) && in_array($_GET['page'], $authorized_pages)) {
   $page = $_GET['page'];   // ... On utilise la page en question
} else {                    // Sinon ...
   $page = 'showposts';     // ... On utilise la page par défaut.
}

// Appel au controller qui va générer les données à afficher :
require("controllers/$page.php");
echo memory_get_peak_usage()/1000;