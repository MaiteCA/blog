<?php
foreach ($posts as $post) {?>
<article class=content>
    <time datetime="<?=$post['date']?>" >
        <span class=day><?=$post['day']?></span>
        <span class=month><?=$post['month']?></span>
        <span class=year><?=$post['year']?></span>
    </time>
    <h1><?=$post['title']?></h1>
    <?=$post['content'];?>
    <footer><a href ="showpost-<?=$post['id'];?>">suite / commentaires (<?=$post['comments_count']?>)</a></footer>
</article>
<?php }?>
