<?php
session_start();

include("funcs.php");
loginCheck();

$id = $_GET["id"];
// echo $id
// DB接続します（エラー処理追加）コピペして部分的に書き換えて使うと良い！
try {
  $pdo = new PDO('mysql:dbname=kadai_db;charset=utf8;host=localhost:3306','root','root');
  // 3306 → ポート番号、最初のroot → ID、最後のroot　→ パスワード
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//3.SELECT * FROM gs_an_table WHERE id=:id;
$sql = "DELETE FROM kadai_an_db WHERE id=:id";
// prepareメソッドに渡している
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
// excuteで実行
$status = $stmt->execute();

// データ処理後
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {

  header("Location: result.php");
  exit;
 
}


?>