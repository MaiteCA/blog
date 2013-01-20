<?php
//On définit les champs de $_POST à vérifier et les filtres à utiliser.
$fieldsToCheck = [
    "name" => FILTER_SANITIZE_STRING,
    "content" => FILTER_SANITIZE_STRING,
    "email" => FILTER_VALIDATE_EMAIL,
    "id" => FILTER_VALIDATE_INT,
];

//On applique les filtre et extrait le tableau pour avoir $name, $content etc.
//!\\ NE JAMAIS UTILISER extract() DIRECTEMENT SUR $_POST
extract(filter_input_array(INPUT_POST,$fieldsToCheck));

//On ajoute le commentaire dans la base de donnée :
add_comment($name,$content,$email,$id);

//Et on renvoit l'utilisateur sur la page du post,
//avec l'ancre #comments pour aller directement en bas de page.
header("Location: showpost?id=$id#comments");