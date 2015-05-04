<!doctype html>
<html lang="ckb" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>فۆرم</title>
</head>
<body>
<?php

// ئەم کۆدانە پەیوەندیدارن بە بابەتی http://www.webchin.org/index.php?besh=dreje&id=115

// ئەگەر دووگمەی ناردنی پەیام کرتە کرابێت ئەوا بەردەوام دەبێت و هەنگاوەکانی داهاتوو جێبەجێ دەکات
if(isset($_POST['submit'])){

// بۆ کار ئاسانکردنەوە سێ  بگۆڕ درووست دەکەین بۆ نرخی فۆرمەکان
$naw = $_POST['naw'];
$email = $_POST['email'];
$peyam = $_POST['peyam'];

// ئەگەر ناو نەنووسراوبێت لە ئیمەیلەکەدا ئاماژە دەکەین بە ئەوەی کە ناو نەنووسراوە
if(empty($naw)){
    $naw = 'ناوی نەنووسیووە';
}

// ئەگەر خانەی ئیمەیل نووسراوەی لە خۆ گرتبێت، چێک دەکرێت بۆ دڵنیابوون لەوەی کە بە شێوازی درووست نووسراوە
if(!empty($email)){

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'تکایە ئیمەیلەکەت بە شێوازی درووست بنووسە';
}
}

// ئەگەر ئیمەیل نەنووسرابێت، لە ئیمەیلەکەدا ئاماژە دەکەین بە ئەوەی کە ئیمەیل نەنووسراوە
else{
    $email = 'ئیمەیلی نەنووسیووە';
}

// ئەگەر خانەی پەیام بەتاڵ بێت، پەیامی خوارەوە پیشان دەدرێت
if(empty($peyam)){
    echo 'ناتوانیت خانەی پەیام بە بەتاڵی بنێریت، تکایە شتێک بنووسە و دووبارە هەوڵ بدەوە';
}


// لە کۆتاییدا پاش دڵنیابوون لەوەی کە ناو و ئیمەیل و پەیام نرخییان هەیە، فۆرمەکە بەڕێ دەکرێت
if($naw) if($email) if($peyam){

// ئەو ئیمەیلەی کە پەیامەکەی بۆ بچێت
$bo = "email@email.com";
$serderr = 'پەیوەندی لە ماڵپەڕەوە';
$peyam = "پەیام لە لایەن: ".$naw."\nئیمەیل: ".$email."\nدەقی پەیام: ".$peyam;
$from = $email;
$headers = 'From: '.$from."\r\n" .
        'Reply-To: '.$email. "\r\n";
mail($bo,$serderr,$peyam,$headers);
 echo'سووپاس، پەیامەکەت بە سەرکەوتوویی بەڕێ کرا';
}

}
// ئەگەر دووگمە کرتە نەکرابوو، هیچ ڕوونادات
?>


    <form action="" name="peywendi" method="post">
    <div>
        ناو: <input type="text" name="naw">
    </div>
    <div>
        ئیمەیل: <input type="email" name="email" title="تکایە ئیمەیلێک بنووسە، بۆ نموونە email@email.com" placeholder="email@email.com">
    </div>
    <div>
        پەیام: <textarea name="peyam" required title="تکایە پەیامێک بنووسە" placeholder="تکایە دەقی پەیامەکەت لە ئێرە بنووسە"></textarea>
    </div>
    <div>
        <button name="submit" type="submit">ناردنی پەیام</button>
    </div>
    </form>
</body>
</html>