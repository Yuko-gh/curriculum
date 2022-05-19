<?php
// セッション開始
if(!isset($_SESSION)){session_start();}

// DBサーバのURL
$db['host'] = "localhost";
// ユーザー名
$db['user'] = "root";
// ユーザー名のパスワード
$db['pass'] = "";
// データベース名
$db['dbname'] = "YIGroupBlog";
