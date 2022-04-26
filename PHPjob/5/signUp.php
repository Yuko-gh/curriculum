<?php
    require_once('function.php');
    $eM = "";
    if(!empty($_POST['user'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if(User_check($user) >= 1){
            $eM = "そのユーザー名は登録できません";
        }else{
            $eM = Insert_db($user,$pass);
            if($eM == ""){
                header("Location:login.php");
                exit;
            }
        }
    }

?>

<html>
    <link rel="stylesheet" href="style.css" />
<body>
    <h1 style="float: left">ユーザー登録画面</h1>
    <a href="login.php" style="float: left;" class="ank_g">戻る</a><br>
    <form action="" method="POST" style="clear: both;">
        <input type="text" name="user" placeholder="ユーザー名" required /><br><br>
        <input type="password" name="pass" placeholder="パスワード" required /><br><br>
        <input type="submit" value="ユーザー登録" class="link_b" />
    </form>
    <p style="color: red;"><?php print $eM; ?></p>
</body>
</html>