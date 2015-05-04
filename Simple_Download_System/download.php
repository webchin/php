<?php 

// ئەم کۆدانە پەیوەندیدارن بە بابەتی http://www.webchin.org/index.php?besh=dreje&id=121

include("config.php"); 
?>
<!doctype html>
<html lang="ckb" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>داگرتنی پەڕگە</title>
</head>
<body>
    <ul>
    <?php
    if(isset($_GET['id']) && isset($_GET['file'])){
    
    // وەرگرتنی نرخی Query ـەکان و خاوێن کردنیان
    $id = intval($_GET['id']);
    $file = mysql_real_escape_string($_GET['file']);
    
    $query_items = "SELECT id, file_name FROM downloads WHERE id = '$id' LIMIT 1";
    $query = @mysql_query($query_items);
    while($row = @mysql_fetch_array($query)){
    
    // دووبارە درووستکردنەوەی hash بۆ چێک کردنی بەستەر و هەروەها لەوەی ئایا کاتەکەی بەسەرچووە یان نە
    $file_name_hash = md5($row['file_name']);
    $day_hash = md5(date('Y-m-d'));
    $salt = md5($salt);
    $all_hash = md5($file_name_hash.$day_hash.$salt);
    
    // ئەگەر hash ـەکان وەک یەک بوون، ئەو کاتە دیارە بەستەرەکە بێ کێشەیە و پەڕگەی ویستراو بانگ دەکەین
    if($file === $all_hash){
    $file = $row['file_name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$all_hash.$ext");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    readfile($file);
    }
    
    else{
    header('Location: '.$domain.'/index.php?error=1');
    }
    
    }
    // کۆتایی MySQL Query
    
    }
    // کۆتایی IF ISSET
    else{
    header('Location: '.$domain.'/index.php?error=1');
    }
    ?>
    </ul>
</body>
</html>