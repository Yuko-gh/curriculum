<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$q1 = [80,22,20,21];
$q2 = ["PHP","Python","JAVA","HTML"];
$q3 = ["join","select","insert","update"];
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$ans = [80, "HTML","select"];
?>
<html>
    <title>第3章のチェックテスト課題</title>
    <link rel="stylesheet" href="css/style.css">
<p>お疲れ様です<!--POST通信で送られてきた名前を出力--><?php print $my_name; ?>さん</p>
<!--フォームの作成 通信はPOST通信で-->
<form action="answer.php" method="POST">
<input type="hidden" name="my_name" value="<?php print $my_name; ?>" />
<?php foreach ($ans as $value){ ?>
    <input type="hidden" name="ans[]" value="<?php print $value; ?>" />
<?php }?>
<h2>①ネットワークのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php foreach($q1 as $value){ ?>
    <input type="radio" name="q1" value="<?php print $value; ?>" required="required"/>
<?php print $value;} ?>

<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php foreach($q2 as $value){ ?>
    <input type="radio" name="q2" value="<?php print $value; ?>" required="required"/>
<?php print $value;} ?>

<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php foreach($q3 as $value){ ?>
    <input type="radio" name="q3" value="<?php print $value; ?>" required="required"/>
<?php print $value;} ?>

<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <br><br>     
    <input type="submit" value="回答する" />
</form>
</html>