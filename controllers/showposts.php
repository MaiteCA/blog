<?php
//On récupère tous les posts
$posts = get_posts();

//Pour chacun des posts...
foreach ($posts as $i => $post) {
    //... On le raccourcis
    $post['content'] = shorten($post['content']);
    //... Et on le met en forme.
    $posts[$i] = format_post($post);
}

//Appel à la vue
require 'views/base.tpl.php';