<?php
// CONFIGURATION
setlocale(LC_ALL,'fr_FR','fra');        //Locale (langue pour la date etc.)
define('DSN' , 'sqlite:database/db');   //Adresse de connexion à la BDD.
define('SALT', 'some_random_string');   //Remplacer par des caractères aléatoires.

// INCLUDES
require "database/model.php";           //Le modèle (base de donnée)
require "controllers/functions.php";    //Les fonctions communes

// AFFICHAGE DE LA PAGE (ROUTE)

//Liste des pages autorisées, et niveau d'habilitation requis.
$authorized_pages = [
    'showpost'   => 0,
    'showposts'  => 0,
    'addcomment' => 0,
    'addlink'    => 0,
    'editpost'   => 3,
    'admin'      => 3,
];

//Si on a le paramètre page ET qu'elle fait partie des pages existantes...
if (isset($_GET['page']) && array_key_exists($_GET['page'],$authorized_pages)) {
   $page = $_GET['page'];   // ... On utilise la page en question
} else {                    // Sinon ...
   $page = 'showposts';     // ... On utilise la page par défaut.
}

//Vérification du niveau d'habilitation
$req_clearance = $authorized_pages[$page];
if ($req_clearance > 0){
    session_start();
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login    = $_POST['login'];
        $password = crypt($_POST['password'],SALT);
        if ($clearance = get_clearance($login,$password)) {
            $_SESSION['login']    = $login;
            $_SESSION['password'] = $password;
        }
    }elseif (isset($_SESSION['login']) && isset($_SESSION['password'])) {
        $clearance = get_clearance($_SESSION['login'],$_SESSION['password']);
    } else {
        $clearance = 0;
    }
    if ($clearance < $req_clearance) {
        $page = 'login';
    }
    if ($clearance === false && isset($_POST['login'])) {
        $alert[] = [
            "type"    => "error",
            "message" => "Identifiant ou mot de passe incorrect !"
        ];
    }
}


$links = get_links();
for ($i = 0; isset($links[$i]); $i++){
    $links[$i]['date']  = substr($links[$i]['date'], 8,2)."/".substr($links[$i]['date'], 5,2);
    $links[$i]['title'] = truncate($links[$i]['title'],100);
}
$page_title = "CF5.fr : actualités et tutoriels sur le développement web (PHP, html5, CSS, javascript...)";
// Appel au controller qui va générer les données à afficher :
require("controllers/$page.php");