<?php

// ئەم کۆدانە پەیوەندیدارن بە بابەتی http://www.webchin.org/index.php?besh=dreje&id=119

include("connect.php");

header("Content-Type: text/xml;charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

$query_articles = "SELECT id, title, published FROM articles ORDER BY id DESC LIMIT 200";
$query = @mysql_query($query_articles);

while($row = @mysql_fetch_array($query)){

    $date = $row['published'];
    $title = htmlspecialchars($row['title']);
    $url = 'http://www.domain.com/article/'.$row["id"];
    $date = date_create($date);
    $date = date_format($date,"Y-m-d");
    
    echo '<url><loc>'.$url.'</loc><lastmod>'.$date.'</lastmod><changefreq>daily</changefreq></url>';

}
echo '</urlset>';
?>