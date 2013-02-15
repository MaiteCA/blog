<?php
//On récupère tous les posts
$posts = get_posts();

//On pourcourt les posts et on les formatte.
for ($i = 0; isset($posts[$i]); $i++) {
    shorten($posts[$i]['content']);
    format_post($posts[$i]);
}

//Appel à la vue
require 'views/rss.tpl.php';