<?php

//最初にsessionを書く　　大事！
session_start();

//POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

include("funcs.php");
//DBへ接続
$pdo = db_connect();

//DBに接続する
try{
  $pdo = new PDO('mysql:dbname=kadai_db;charset=utf8;host=localhost:3306','root','root');
}catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}



//データ登録SQL作成
$sql =  "SELECT * FROM kadai_user_table WHERE u_id = :lid AND u_pw = :lpw";
$stmt = $pdo->prepare($sql);
//bindvAalueにphp変数を渡してDBに渡す必要がある　bindValueは：が必ずつく
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); 
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); 
//execute 実行する
$status = $stmt->execute();

// SQL実行時にエラーがある場合STOP
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} 

// 抽出データ数を取得
$val = $stmt->fetch(); //１レコードだけ取得可能

if ($val['id'] != '') {
  //Login成功時 該当レコードがあればSESSIONに値を代入
  $_SESSION['chk_ssid'] = session_id();
  $_SESSION['kanri_flg'] = $val['kanri_flg'];
  $_SESSION['name'] = $val['name'];
  header('Location: select.php');
} else {
  //Login失敗時(Logout経由)
  header('Location: login.php');
}
exit();

?>