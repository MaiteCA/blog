<?php
/**
 * Met en forme un post en le mettant en forme via textile,
 * en créant des paragraphes, et en décomposant la date en jour/mois/année
 * @param  array $post Le post à mettre en forme (passé par référence)
 * @return array Le post mis en forme
 */
function format_post(&$post) {
    $post['content']= format($post['content']);
    $post['year']   = substr($post['date'], 0,4);
    $post['month']  = utf8_encode(strftime("%b",strtotime($post['date'])));
    $post['day']    = substr($post['date'], 8,2);
    if (isset($post['email'])) {
        $post['avatar_hash'] = md5(strtolower(trim($post['email'])));
    } else if (isset($post['name'])) {
        $post['avatar_hash'] = md5(strtolower(trim($post['name'])));
    }
}

/**
 * Raccourcit un texte (en allant jusqu'à une ligne commençant par "===")
 * @param  string $post Le texte à raccourcir
 * @return string Le texte raccourcis.
 */
function shorten(&$text) {
    //On cherche la position d'une ligne qui commence par ===
    $length = strpos($text, "\n===");

    //Si on a trouvé (donc $length existe), on ne récupère que jusque là.
    if ($length) {
        $text = substr($text, 0, $length);
    }
}

/**
 * Met un texte en forme avec les syntaxes suivantes:
 * *gras*, _italique_, [php]mon code[/php]
 * # Titre 1
 * ## Titre 2
 * @param  string $text texte à mettre en forme
 * @return string texte mis en forme
 */
function format($text) {
    $replace   = [
        '#\*([^\*]+)\*#' => '<b>$1</b>',
        '#\_([^\_]+)\_#' => '<i>$1</i>',
        '#\[(php|markup|css|javascript)\="(.+)"](.+)\[/\1\]#msU' => '<pre title="$2"><code class=language-$1>$3</code></pre>',
        '#\[k\=(.+)\]#msU' => '<kbd>$1</kbd>',
        '#\[(php|markup|css|javascript)\](.+)\[/\1\]#msU' => '<pre><code class=language-$1>$2</code></pre>',
        '#\r\n\#\#(.+)\r\n#' => '<h3>$1</h3>',
        '#\r\n\#(.+)\r\n\r\n#' => '<h2>$1</h2>',
        '#^\#(.+)\r\n\r\n#' => '<h2>$1</h2>',
        '#\={3,}#' => '',
    ];

    return nl2br(preg_replace(array_keys($replace), $replace, $text),false);
}

/**
 * Tronque une chaine de caractère
 * @param  string  $string      La chaine de caractère à tronquer
 * @param  int     $max_length  Longueure maximum de la chaine
 * @param  string  $ellipsis    Caractères à utiliser pour l'ellipse ("...")
 * @return string
 */
function truncate($string,$max_length,$ellipsis="..."){
    if (strlen($string) > $max_length){
        $max_length -= strlen($ellipsis);
        $string = substr($string,0,$max_length).$ellipsis;
    }
    return $string;
}