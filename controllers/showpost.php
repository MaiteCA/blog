<?php
isset($_GET["id"]) ? $id = $_GET["id"] : $id = 0;

$post = get_post($id);          //On récupère le post avec l'id
$post = format_post($post);     //On le met en forme.

$comments = get_comments($id);  //On récupère les commentaires

//On parcourt les commentaires et on les met en forme :
foreach ($comments as $i => $comment) {
    $comments[$i] = format_post($comment);
}

//Appel à la vue pour afficher la page.
require 'views/base.tpl.php';