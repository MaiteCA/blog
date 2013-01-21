<?php
//On récupère tous les posts
$posts = get_posts();

//Pour chacun des posts...
$total_posts = count($posts);
for ($i = 0; $i<$total_posts; $i++) {
    shorten($posts[$i]['content']);
    format_post($posts[$i]);
}

//Appel à la vue
require 'views/base.tpl.php';