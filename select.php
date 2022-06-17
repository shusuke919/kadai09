<?php

session_start();

//includeで関数を呼び出す　require_once('funcs.php');＝include("funcs.php");どちらでもOK
include("funcs.php");
loginCheck();

//DBへ接続
$pdo = db_connect();

$sql = 'SELECT * FROM kadai_user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データの表示
$view = '';
if ($status == false){
 //execute（SQL実行時にエラーがある場合）
 $error = $stmt->errorInfo();
 exit("ErrorQuery:".$error[2]);
}else{
while ( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
 $view .= '<p>';
 $view .= '<a href="detail.php?id=' . $r["u_id"] . '">';
 $view .= $r['u_id'] . " " . $r['name'] . " " ;
 $view .= '</a>';
 $view .= "　";

 if($_SESSION['kanri_flg']){
  $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r['u_id'] . '">';
  $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
  $view .= '</a>';
}

 $view .= '</p>';

}
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
   
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                    <a class="navbar-brand" href="logout.php">ログアウト</a>
                    <a class="navbar-brand" href="main.php">アンケートに回答する</a>

                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

</body>

</html>
