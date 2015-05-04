<?php

// ئەم کۆدانە پەیوەندیدارن بە بابەتی http://www.webchin.org/index.php?besh=dreje&id=119

$ping_google = file_get_contents('http://www.google.com/webmasters/sitemaps/ping?sitemap=http://www.domain.com/sitemap.php');
echo $ping_google;
?>