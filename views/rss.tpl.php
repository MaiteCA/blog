<?="<?xml version=\"1.0\" ?>\n"?>
<rss version="2.0">
    <channel>
      <title>CF5.fr</title>
      <link>http://cf5.fr</link>
      <description>Le blog rafraîchissant sur les technologies du web</description>
<?php foreach ($posts as $post) {?>
       <item>
          <title><?=$post['title']?></title>
          <link>http://cf5.fr/<?=$post['id']?></link> 
          <description><?=$post['title']?></description>
       </item>
<?php }?>
    </channel>
</rss>