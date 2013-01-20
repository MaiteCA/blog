<?php

// Si on reçoit du POST, c'est qu'on essaye d'ajouter/mettre à jour un post
if (isset($_POST['title']) && isset($_POST['title'])) {
    $fieldsToCheck = [
        "title" => FILTER_SANITIZE_STRING,
        "content" => FILTER_UNSAFE_RAW,
        //!\\ On ne protège pas content, c'est à l'admin de ne pas faire n'imp.
        'id' => FILTER_VALIDATE_INT,
    ];

    extract(filter_input_array(INPUT_POST,$fieldsToCheck));

    //Si on a un id, c'est qu'on cherche à modifier un post existant.
    if ($id) {
        update_post($title, $content, $id);
    } else {
        add_post($title,$content);
    }
}

//Si on a l'id, on récupère le contenu pour préremplir le form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = get_post($id);
} else {
    $id = null;
    $post['title'] = null;
    $post['content'] = null;
}

require 'views/base.tpl.php';