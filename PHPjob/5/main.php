<?php
    require_once('function.php');
    Login_Session_Check();
    if(!empty($_GET['id'])){
        Book_Delete($_GET['id']);
        $_GET = array();
        header("Location:main.php");
        exit;
    }
    $row = Book_db_View();
?>

<html>
    <link rel="stylesheet" href="style.css" />
<body>
    <h1>在庫一覧画面</h1>
    <a href="new_book.php" class="ank_b">在庫新規登録</a>
    <a href="logout.php" class="ank_gr">ログアウト</a><br>
    <table class="main_table">
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>
        <?php
            $c = count($row) -1;
         for($i=$c; $i>=0; $i--){ ?>
        <tr>
            <td><?php print $row[$i]['title']; ?></td>
            <td><?php print $row[$i]['date']; ?></td>
            <td><?php print $row[$i]['stock']; ?></td>
            <td>
                <a href="main.php?id='<?php print $row[$i]['id']; ?>'" class="ank_r">削除</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>