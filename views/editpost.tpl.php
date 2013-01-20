<article class=content>
    <form action="#" method="POST" id=post-form>
        <input type=hidden name=id value=<?=$id?> />
        <input type=text name=title placeholder="Titre" value="<?= $post['title'] ?>" required /><br>
        <textarea name=content placeholder="Contenu de l'article" required><?= $post['content'] ?></textarea>
        <input type=submit>
    </form>
</article>