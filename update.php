<?php


include("funcs.php");
loginCheck();
// getデータ取得
$name   = $_GET["name"];
$email  = $_GET["email"];
$naiyou = $_GET["naiyou"];
$age2    = $_GET["age2"];
$id    = $_GET["id"];


// DB接続します（エラー処理追加）コピペして部分的に書き換えて使うと良い！
try {
  $pdo = new PDO('mysql:dbname=kadai_db;charset=utf8;host=localhost:3306','root','root');
  // 3306 → ポート番号、最初のroot → ID、最後のroot　→ パスワード
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

// データ更新　SQL作成
$sql = 'UPDATE kadai_an_db SET name=:name,email=:email,naiyou=:naiyou,age2=:age2 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name,     PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age2', $age2,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id,         PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


// データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //５．index.phpへリダイレクト
  header("Location: result.php");
  

}
?> 
