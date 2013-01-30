<?php
if (!isset($id)) {
    isset($_GET["id"]) ? $id = $_GET["id"] : $id = 0;
}

$post = get_post($id);          //On récupère le post avec l'id
format_post($post);             //On le met en forme.

$comments = get_comments($id);  //On récupère les commentaires

//On parcourt les commentaires et on les met en forme :
for ($i = 0; isset($comments[$i]); $i++) {
    format_post($comments[$i]);
}

//Appel à la vue pour afficher la page.
require 'views/base.tpl.php';