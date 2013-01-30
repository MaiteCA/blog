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
        <div class="keyboard">
            <span class=fkey style="margin-right:8px;"></span><span class=fkey></span><span class=fkey></span><span class=fkey></span><span class=fkey style="margin-right:8px;"></span><span class=fkey id=f5></span><span class=fkey></span><span class=fkey></span><span class=fkey style="margin-right:8px;"></span><span class=fkey></span><span class=fkey></span><span class=fkey></span><span class=fkey></span><br><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span style="width:16px"></span><br><span style="width:16px"></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><br><span style="width:22px"></span><span></span><span></span><span></span><span>.</span><span></span><span></span><span>.</span><span></span><span></span><span></span><span></span><span style="width:22px"></span><br><span style="width:30px"></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span style="width:30px"></span><br><span id=ctrl style="width:20px"></span><span></span><span></span><span style="width:120px"></span><span></span><span></span><span></span>
        </div>
        <h1><a href='./'>CF5.fr</a></h1>
        <h2>Un blog rafraichissant sur les technologies du web.</h2>
    </header>

    <div id=sidebar>
        <strong>Réseaux sociaux :</strong>
        <a class=rss href="rss.xml">Abonnez vous au flux RSS</a>
        <a class=twitter href="https://twitter.com/">Suivez nous sur Twitter</a>
        <a class=googleplus href="https://plus.google.com/">Suivez nous sur Google+</a>
        <div class=links>
            <strong>Revue de presse :</strong>
                <ul>
<?php foreach ($links as $link):?>
                    <li>[<?=$link['date']?>]<a href="<?=$link['url']?>"><?=$link['title']?></a></li>
<?php endforeach; ?>
                </ul>
        </div>
        <div class="adsense">
        <script type="text/javascript"><!--
        google_ad_client = "ca-pub-9468683635844150";
        /* blog square */
        google_ad_slot = "5798227856";
        google_ad_width = 250;
        google_ad_height = 250;
        //-->
        </script>
        <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
        </div>
    </div>
<?php for ($i = 0; isset($alert[$i]); $i++) { ?>
    <div class="alert <?= $alert[$i]['type'] ?>"><?= $alert[$i]['message'] ?></div>
<?php }
require "views/"."$page.tpl.php"; ?>
<script src="./js/prism.min.js"></script>
<script src="./js/script.js"></script>
</body>
</html>