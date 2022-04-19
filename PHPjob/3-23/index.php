<?php
    $testFile = "test.txt";
    $Contents = date("Y年m月d日 H:i:s", time()) . "\n";

    if (is_writable($testFile)){
        $fp = fopen($testFile,"a");
        fwrite($fp, $Contents);
        fclose($fp);
        print "書き込みSuccess!<br>";
    }else {
        print "書き込みError<br>";
        exit;
    }
    $testFile = "test2.txt";
    if(is_readable($testFile)){
        $fp = fopen($testFile, "r");
        while ($line = fgets($fp)){
            print $line."<br>";
        }
        fclose($fp);
        print "読み込みSuccess!<br>";
    }else{
        print "読み込みError<br>";
        exit;
    }
    $testFile = "test.txt";
    print "<br>-----------------------------<br><br>";
    if(is_readable($testFile)){
        $fp = fopen($testFile, "r");
        while ($line = fgets($fp)){
            print $line."<br>";
        }
        fclose($fp);
    }else{
        exit;
    }


?>