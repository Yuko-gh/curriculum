<?php
    $_SESSION = array();

    if(empty($_SESSION[0])){
        print "お疲れさまでした。";
    }else{
        print var_dump($_SESSION);
    }
?>
<html>
    <link rel="stylesheet" href="style.css" />
<body>
    <h1>ログアウトしました</h1>
    <a href="login.php" class="ank_gr">戻る</a><br>

</body>
</html>