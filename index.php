<?php
// CONFIGURATION
setlocale(LC_ALL,'fr_FR','fra');
define('DSN','sqlite:database/db');

// INCLUDES
require "database/model.php";
require "controllers/functions.php";

// AFFICHAGE DE LA PAGE (ROUTE)
$authorized_pages = [
    'showpost',
    'showposts',
    'addcomment',
    'editpost',
    'admin',
];

if (isset($_GET['page']) && in_array($_GET['page'], $authorized_pages)) {
   $page = $_GET['page'];
} else {
   $page = 'showposts';
}

// Appel au controller qui va générer les données à afficher :
require("controllers/$page.php");