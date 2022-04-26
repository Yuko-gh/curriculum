<?php
    require_once('db_connect.php');
    // 今日の日付
    function Today(){
        $today = date("Y-m-d",time());
        return $today;
    }
    function Password_Hash_Edit($pass){
        $options = array('cost' => 10);
        return $reg_pass = password_hash($pass, PASSWORD_DEFAULT, $options);          
    };
    function sanitize($before) {
        foreach($before as $key => $value) {
        $after[$key] = htmlspecialchars($value);
        }
        return $after;
    }
    // SQLテキスト保存
    function Edit_SQL_File($sql) {
        $file = "sql.txt";
        $eM = "";
        if(is_writable($file)){
            $fp = fopen($file, "a");
            fwrite($fp, $sql);
            fclose($fp);
            $eM = "";
            return $eM;
        }else{
            $eM = "保存に失敗しました";
            return $eM;
        }
    }

    // usersテーブルに追加
    function Insert_db($name,$pass){
        $eM = "";
        try {
        // ハッシュ化
        $reg_pass = Password_Hash_Edit($pass);
        $pdo = db_connect();
        $sql = "INSERT INTO users(name,password) VALUES (:name,:pass)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':pass',$reg_pass);
        $stmt->execute();
        // ファイル保存
        $fsql = "INSERT INTO users(name, password) VALUES('".$name."','".$reg_pass."');\n";
        $eM = Edit_SQL_File($fsql);
        } catch (PDOException $e){
            print $e->getMessage();
            die();
        }
        return $eM;
    }
    function User_check($name){
        try{
        $pdo = db_connect();
        $sql = "SELECT Count(name) FROM users WHERE name=:name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name",$name);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['Count(name)'];
        exit;
        }catch(PDOException $e){
            die();
        }
    }
    function Password_Check($user,$pass){
        $boo = false;
        try{
        $pdo = db_connect();
        $sql = "SELECT password FROM users WHERE name=:name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name",$user);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($pass,$row['password'])){
            $boo = true;
            return $boo;
            exit;
        }else {
            $boo = false;
            return $boo;
            exit;
        }
        }catch(PDOException $e){
            die();
        }
    }
    function Login_Session_Check(){
        session_start();
        if (empty($_SESSION['user'])) {
            header("Location: login.php");
            exit;
        }
    }
    function Book_db_View(){
        try {
            $pdo = db_connect();
            $sql = "SELECT * FROM books ORDER BY date";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
            exit;
        }catch(PDOException $e){
            die();
        }
    }
    function Book_Insert($t,$d,$s){
        $eM = "";
        try {
        $pdo = db_connect();
        $sql = "INSERT INTO books(title,date,stock) VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($t,$d,$s));
        // ファイル保存
        $fsql = "INSERT INTO books(title, date, stock) VALUES('".$t."','".$d."',".$s.");\n";
        $eM = Edit_SQL_File($fsql);
        } catch (PDOException $e){
            die();
        }
        return $eM;        
    }
    function Book_Delete($id){
        try {
            $pdo = db_connect();
            $sql = "DELETE FROM books WHERE id=".$id;
            $stmt = $pdo->prepare($sql);
            //$stmt->bindParam(":id", $id);
            $stmt->execute();
            // ファイル保存
            $fsql = "DELETE FROM books WHERE id = ".$id.";\n";
            $eM = Edit_SQL_File($fsql);
        } catch (PDOException $e){
            die();
        }
    }
?>