<?php 

// ئەم کۆدانە پەیوەندیدارن بە بابەتی http://www.webchin.org/index.php?besh=dreje&id=121

include("config.php"); 
?>
<!doctype html>
<html lang="ckb" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لیستی پەڕگە</title>
    <style>
    .error{
    border: solid 1px #c1002c;
    background: #fac8d4;
    color: #4d4d4d;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
    margin: 5px;
    }
    </style>
</head>
<body>
    <?php
    if(isset($_GET['error']) && $_GET['error'] == "1"){
    echo '<div class="error">
    بەستەری داگرتن هەڵەیە
    </div>';
    }
    ?>
    <ul>
    <?php 
    $query_items = "SELECT id, file_name, title FROM downloads ORDER BY id DESC LIMIT 10";
    $query = @mysql_query($query_items);
    while($row = @mysql_fetch_array($query)){
    
    // درووستکردنی hash ی تایبەت بە پەڕگە بۆ داگرتن، دواتر ئەم hash ـە لەگەڵ هی پەڕگەی داگرتن بەراورد دەکەین بۆ دڵنیابوون لەوەی کە هەردووکیان وەک یەکن
    $file_name_hash = md5($row['file_name']);
    $day_hash = md5(date('Y-m-d'));
    $salt = md5($salt);
    $all_hash = md5($file_name_hash.$day_hash.$salt);
    echo '<li><a href="'.$domain.'/download.php?id='.$row['id'].'&file='.$all_hash.'">'.$row['title'].'</a></li>';
    }
    ?>
    </ul>
</body>
</html>