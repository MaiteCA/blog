<article class='content'>
    <time datetime="<?=$post['date']?>">
        <span class=day><?= $post['day'] ?></span>
        <span class=month><?= $post['month'] ?></span>
        <span class=year><?=$post['year'] ?></span>
    </time>
    <h1><?= $post['title'] ?></h1>
    <?= $post['content']; ?>
    <section class='comments'>
        <h1>commentaires</h1>
        <form action="addcomment" method="POST" id=comment-form>
            <input type=hidden name=id value=<?=$id?> />
            <input type=text name=name placeholder="Nom (obligatoire)" required />
            <input type=email name=email placeholder="e-mail (facultatif)" /><br>
            <textarea name=content placeholder="Commentaire (Vous pouvez écrire en *gras* ou en _italique_)" required></textarea>
            <input type=submit>
        </form>
        <div>
<?php foreach ($comments as $comment) { ?>
            <article>
                <div>
                    <b><?= $comment['name'] ?> :</b>
                    <p><?= $comment['content'] ?></p>
                </div>
            </article>
<?php } ?>
        </div>
    </section>
</article>