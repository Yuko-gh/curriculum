<?php
    $str = "";
    while($str == ""){
        $r = rand(0,9);
        switch($r){
            case 0: $str = "凶";
                    break;
            case 1:
            case 2:
            case 3: $str = "小吉";
                    break;
            case 4:
            case 5:
            case 6: $str = "中吉";
                    break;
            case 7:
            case 8: $str = "吉";
                    break;
            case 9: $str = "大吉";
                    break;
            default: break;
        }
    }
    print "ランダムに選ばれた運勢<br>---------------------<br>";
    print date("Y/m/d",time())."の運勢は<br>選ばれた数字は".$r."<br>".$str."<br>";
    print "---------------------<br>";
?>
<p>0~9の番号を使って好きな数字の羅列を入力してください。</p>
<form action="reslut.php" method="POST">
    <input type="text" name="num" />
    <input type="submit" value="占う" /><br>
</form>
