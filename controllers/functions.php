<?php
/**
 * Met en forme un post en le mettant en forme via textile,
 * en créant des paragraphes, et en décomposant la date en jour/mois/année
 * @param  array $post Le post à mettre en forme (passé par référence)
 * @return array Le post mis en forme
 */
function format_post(&$post){
    $post['content']= format($post['content']);
    $post['year']   = substr($post['date'], 0,4);
    $post['month']  = utf8_encode(strftime("%b",strtotime($post['date'])));
    $post['day']    = substr($post['date'], 8,2);
}

/**
 * Raccourcit un texte (en allant jusqu'à une ligne commençant par "===")
 * @param  string $post Le texte à raccourcir
 * @return string Le texte raccourcis.
 */
function shorten(&$text){
    //On cherche la position d'une ligne qui commence par ===
    $length = strpos($text, "\n===");

    //Si on a trouvé (donc $length existe), on ne récupère que jusque là.
    if ($length){
        $post['content'] = substr($text, 0, $length);
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
        '#\[(php|html|css|javascript)\="(.+)"](.+)\[/\1\]#ms' => '<pre title="$2"><code class=language-$1>$3</code></pre>',
        '#\[(php|html|css|javascript)\](.+)\[/\1\]#ms' => '<pre><code class=language-$1>$2</code></pre>',
        '#\r\n\#\#(.+)\r\n#' => '<h3>$1</h3>',
        '#\r\n\#(.+)\r\n\r\n#' => '<h2>$1</h2>',
        '#^\#(.+)\r\n\r\n#' => '<h2>$1</h2>',
        '#\={3,}#' => '',
    ];

    return nl2br(preg_replace(array_keys($replace), $replace, $text),false);
}