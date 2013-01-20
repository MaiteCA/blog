<a href='editpost'> Ajouter un nouvel article </a>
<table class='content listposts'>
<?php foreach ($posts as $post) { ?>
    <tr>
        <td><?= $post['date'] ?></td>
        <td><?= $post['title'] ?></td>
        <td><a href='editpost-<?= $post['id'] ?>'>modifier</a></td>
    </tr>
<?php } ?>
</table>