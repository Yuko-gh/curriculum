<?php
    require_once('function.php');

    $eM = "";
    if(!empty($_POST['user'])){
        $post = sanitize($_POST);
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        session_start();
        $_SESSION['user'] = $user;
        if (User_check($user) == 1){
            if(Password_Check($user,$pass)){
                header("Location:main.php");
                exit;
            }else {
                $eM = "パスワードが違います";
            }
        }else{
            $eM = "ユーザー登録されていません";
        }
    }
?>

<html>
    <link rel="stylesheet" href="style.css" />
<body>
    <h1 style="float: left;">ログイン画面</h1>
    <a href="signUp.php" style="float: left;" class="ank_g">新規ユーザー登録</a><br>
    <form action="" method="POST" style="clear: both;">
        <input type="text" name="user" placeholder="ユーザー名" required /><br><br>
        <input type="password" name="pass" placeholder="パスワード" required /><br><br>
        <input type="submit" value="ログイン" class="link_b" />
    </form>
    <p style="color: red;"><?php print $eM; ?></p>
</body>
</html>