<?php
session_start();

//includeで関数を呼び出す　require_once('funcs.php');＝include("funcs.php");どちらでもO
include("funcs.php");

// 入力チェック（受信確認処理追加）
if(
  !isset($_GET["name"]) || $_GET["name"]=="" ||
  !isset($_GET["lid"]) || $_GET["lid"]=="" ||
  !isset($_GET["lpw"]) || $_GET["lpw"]=="" 
){
  exit('ParamError');
}

// getデータ取得
$u_id = $_GET["lid"];
$u_pw = $_GET["lpw"];
$name = $_GET["name"];

// echo $name;

//DBへ接続
$pdo = db_connect();

// データ登録　SQL作成
$stmt = "INSERT INTO kadai_user_table(id, name, u_id, u_pw )VALUES(NULL, :a1, :a2, :a3)";
$stmt = $pdo->prepare($stmt);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $u_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//passをハッシュ化
$stmt->bindValue(':a3', password_hash($u_pw, PASSWORD_DEFAULT), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();



// データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //５．index.phpへリダイレクト
  $pw = password_hash('u_pw', PASSWORD_DEFAULT);
  header("Location: main.php");
  exit;

}


?> 
