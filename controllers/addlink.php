<?php
$fieldsToCheck = [
    "title" => FILTER_SANITIZE_STRING,
    "url" => FILTER_VALIDATE_URL,
    "key" => FILTER_UNSAFE_RAW,
];

extract(filter_input_array(INPUT_GET,$fieldsToCheck));

if ($title === false) {
    $alert[] = [
        "type"    => "error",
        "message" => "Il semble y avoir un problème avec le titre"
    ];
} elseif ($url=== false) {
    $alert[] = [
        "type"    => "error",
        "message" => "l'URL n'est pas au bon format"
    ];
} else {
    $title = truncate($title,140);
    add_link($title, $url);
    $alert[] = [
        "type"    => "success",
        "message" => "le lien a bien été ajouté"
    ];
}

$page = 'showposts';
require 'controllers/showposts.php';




//?title=Un e-mail en HTML responsive multi-clients&url=http%3A%2F%2Fwww.alsacreations.com%2Ftuto%2Flire%2F1533-un-e-mail-en-html-responsive-multi-clients.html

