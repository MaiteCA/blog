<?php
/**
 * Exécute une Requete SQL.
 * @param  string $req La requête à exécuter.
 * @param  array  $params Les paramètres
 * @return array  Le résultat de la requête (tableau associatif)
 */
function execute($req,$params){
    $db = new PDO(DSN);
    $stmt = $db->prepare($req);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/** Récupère un post à partir de son id.*/
function get_post($id){
    $req = "SELECT id,title,content,date
            FROM post WHERE id = ?";
    return execute($req,[$id])[0];//un seul résultat, donc on renvoie la ligne 0
}

/** Récupère $limit posts à partir du numéro $start, classés par date décroissante.*/
function get_posts($start=0, $limit=20){
    $req = "SELECT id,title,content,date, (SELECT COUNT(*) FROM comment WHERE post_id=post.id) comments_count
            FROM post
            ORDER BY date DESC
            LIMIT ?, ?";
    return execute($req, [$start, $limit]);
}

/** Récupère $limit posts d'une catégorie $category en partant du numéro $start,classés par date décroissante. */
function get_posts_by_category($category, $start=0, $limit=20){
    $req = "SELECT id,title,content,date
            FROM post
            WHERE category= ? ORDER BY date LIMIT ?, ?";
    return execute($req, [$category, $start, $limit]);
}


/** Ajoute un post avec un titre, un contenu, et une catégorie. */
function add_post($title, $content){
    $req = "INSERT INTO post
            (title, content)
            VALUES (?,?)";
    return execute($req, [$title, $content]);
}

/** Ajoute un post avec un titre, un contenu, et une catégorie. */
function update_post($title, $content, $id){
    $req = "UPDATE post
            SET title = ?, content = ?
            WHERE id = ?";
    return execute($req, [$title, $content, $id]);
}

/** Récupère les commentaires correspondant au post $id */
function get_comments($id){
     $req = "SELECT content,name,email,date
             FROM comment
             WHERE post_id=?
             ORDER BY date DESC";
     return execute($req,[$id]);
}

/** Ajoute un commentaire */
function add_comment($name, $content,$email, $post_id){
     $req = "INSERT INTO comment
             (name, content, email, post_id)
             VALUES (?,?,?,?)";
     return execute($req,[$name, $content, $email, $post_id]);
}