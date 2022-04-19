<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$my_name = $_POST['my_name'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$ans = $_POST['ans'];

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function AnswerCheck($a,$i){
    if($a == $i){
        print "正解！";
    }else{
        print "残念・・・";
    }
}
?>
<html>
    <title>第3章のチェックテスト課題</title>
    <link rel="stylesheet" href="css/style.css">
<br>
<p><!--POST通信で送られてきた名前を表示--><?php print $my_name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php AnswerCheck($q1,$ans[0]); ?>
<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php AnswerCheck($q2,$ans[1]); ?>
<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php AnswerCheck($q3,$ans[2]); ?>
</html>