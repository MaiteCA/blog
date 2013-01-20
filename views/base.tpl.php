<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="./style/prism.css" rel=stylesheet>
    <link href="./style/main.css" rel=stylesheet>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
</head>
<body>
    <header>
        <h1><a href='./'>Mon blog</a></h1>
    </header>
    <div id=sidebar>
        <a href='admin'>Administration</a>

        <a class=rss href="rss.xml">Abonnez vous au flux RSS</a>
        <a class=twitter href="https://twitter.com/">Suivez nous sur Twitter</a>
        <a class=googleplus href="https://plus.google.com/">Suivez nous sur Google+</a>
    </div>
    <?php require "views/"."$page.tpl.php"; ?>
<script src="./js/prism.min.js"></script>
<script src="./js/script.js"></script>
</body>
</html>