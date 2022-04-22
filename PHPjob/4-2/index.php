<html>
<title>Y&I Group Inc.</title>
<link rel="stylesheet" href="style.css" />
<?php
    require_once("getData.php");
    if(!isset($_SESSION)){session_start();}
    $getData = new getData();
    $getData->__construct();
    $userdata = $getData -> getUserData();
    $g = $getData -> getGyo();
    $c = 0;
    //print $g['COUNT(id)'];
    for($i=$g['COUNT(id)'];$i > 0;$i--){
        $blog[$c] = $getData -> getPostData($i);
        $c++;
    }
    //$blog = $getData->getPostData(0);
    //var_dump($blog);
    function getCategory($n){
        if($n == 1){$category = "食事";}
        elseif($n == 2){$category = "旅行";}
        else{$category = "その他";}
        return $category;
    }
?>
<body>
    <div class="wrapper">
        <div class="head">
            <div class="logo"><img src="logo.png" alt="Y&I group.inc" width="200" /></div>
            <div class="had_t">ようこそ <?php print $userdata["last_name"]." ".$userdata["first_name"]; ?>さん</div>
            <div class="had_b">最終ログイン日： <?php print $userdata["last_login"]; ?></div>
        </div>
        <div class="main">
            <table>
                <tr>
                    <th>記事ID</th><th>タイトル</th><th>カテゴリ</th><th>本文</th><th>投稿日</th>
                </tr>
                <?php for ($i = 0; $i < $g['COUNT(id)']; $i++) { ?>
                <tr>
                    <td><?php print $blog[$i]["id"]; ?></td>
                    <td><?php print $blog[$i]["title"]; ?></td>
                    <td><?php print getCategory($blog[$i]["category_no"]); ?></td>
                    <td><?php print $blog[$i]["comment"]; ?></td>
                    <td><?php print $blog[$i]["created"]; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="foot">Y&I group.inc</div>
    </div>
</body>
</html>