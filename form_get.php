<?php

include("funcs.php");
loginCheck();
// 入力チェック（受信確認処理追加）
if(
  !isset($_GET["name"]) || $_GET["name"]=="" ||
  !isset($_GET["email"]) || $_GET["email"]=="" ||
  !isset($_GET["naiyou"]) || $_GET["naiyou"]=="" ||
  !isset($_GET["age2"]) || $_GET["age2"]==""
){
  exit('ParamError');
}

// getデータ取得
$name = $_GET["name"];
$email = $_GET["email"];
$naiyou = $_GET["naiyou"];
$age2 = $_GET["age2"];
// echo  $name. "<br>";
// echo  $mail. "<br>";

session_start();
//includeで関数を呼び出す　require_once('funcs.php');＝include("funcs.php");どちらでもOK
include("funcs.php");

//DBへ接続
$pdo = db_connect();

// データ登録　SQL作成
$stmt = "INSERT INTO kadai_an_db(id, name, email, naiyou, age2, 
indate )VALUES(NULL, :a1, :a2, :a3, :a4, sysdate())";
$stmt = $pdo->prepare($stmt);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $age2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

// データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //５．index.phpへリダイレクト
  header("Location: main.php");
  exit;

}
?> 


