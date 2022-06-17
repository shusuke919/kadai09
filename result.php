<?php
session_start();

//includeで関数を呼び出す　require_once('funcs.php');＝include("funcs.php");どちらでもOK
include("funcs.php");
loginCheck();


//DBへ接続
$pdo = db_connect();
//データ登録SQL作成
// $stmt = $pdo->prepare("SELECT * FROM kadai_an_db");

$stmt = $pdo->prepare("SELECT * FROM kadai_an_db;SELECT COUNT(*) FROM kadai_an_db;");


$status = $stmt->execute();


//データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .='<a href="view.php?id='.$result["id"].'">';
    $view .= $result["id"]."-".$result["name"].$result["age2"];
    $view .='</a>';
    $view .='　';
    $view .='<a href="delete.php?id='.$result["id"].'">';
    $view .='[削除]';
    $view .='</a>';
    $view .= '</p>';
  }


  
// 2つ目の実行結果に移動
  $stmt->nextRowset();
  $count = $stmt->fetch(PDO::FETCH_ASSOC);

}
// テーブル内のレコード合計表示　
echo "アンケートに答えてくれた合計人数は";
echo $count["COUNT(*)"]."人";



?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="main.php">アンケートに戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>