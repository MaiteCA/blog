<article class='content'>
    <time datetime="<?=$post['date']?>">
        <span class=day><?= $post['day'] ?></span>
        <span class=month><?= $post['month'] ?></span>
        <span class=year><?=$post['year'] ?></span>
    </time>
    <h1><?= $post['title'] ?></h1>
    <?= $post['content']; ?>
    <div class=social>
        <a href="https://twitter.com/share" class=twitter-share-button data-lang=fr data-count=none>Twitter</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        <div class=g-plusone data-size=medium data-width=120 data-annotation=none></div>
        <script type="text/javascript">window.___gcfg = {lang: 'fr'};(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>
    </div>
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