<?php
    require_once('function.php');
    Login_Session_Check();

    $eM = "";
    if(!empty($_POST['title'])){
        $t = $_POST['title'];
        $d = $_POST['date'];
        $s = $_POST['stock'];
        $eM = Book_Insert($t,$d,$s);

        if($eM == ""){
            header("Location:main.php");
            exit;
        }
    }
?>

<html>
    <link rel="stylesheet" href="style.css" />
<body>
    <h1 style="float: left;">本　登録画面</h1>
    <a href="main.php" style="float: left;" class="ank_g">戻る</a><br>
    <form action="" method="POST" style="clear: both;">
        <input type="text" name="title" placeholder="本のタイトル" required /><br><br>
        発売日：<input type="date" name="date" value="<?php print Today(); ?>" required /><br><br>
        在庫数：<input type="number" name="stock" min="0" max="100" value="1" required /><br><br>
        <input type="submit" value="登録" class="link_b" />
    </form>
    <p style="color: red;"><?php print $eM; ?></p>
</body>
</html>