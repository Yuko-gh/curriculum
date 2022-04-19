<?php
    $num = $_POST['num'];
    
    function Nr($n){
        try {
            if(preg_match("/^[0-9]+$/",$n)){return rand(0,strlen($n))*(-1);}
            else{throw new Exception('整数以外が入力されています。<br>');
            return false;}
        } catch(Exception $e){
            print $e -> getMessage();
        }
    }
    $ram = Nr($num);
    $str = "";
    while($str == "" && $ram != false){
        $r = substr($num,$ram,1);
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
    if ($str != ""){
        print date("Y/m/d",time())."の運勢は<br>選ばれた数字は".$r."<br>".$str."<br>";
    }
?>
<br><br>
<form action="index.php" method="POST">
    <input type="submit" value="戻る" />
</form>