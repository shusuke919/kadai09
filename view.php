<?php
// getでIDを取得
$id = $_GET["id"];

//includeで関数を呼び出す　require_once('funcs.php');＝include("funcs.php");どちらでもOK
include("funcs.php");

loginCheck();

//DBへ接続
$pdo = db_connect();

//3.SELECT * FROM gs_an_table WHERE id=:id;
$sql = "SELECT * FROM kadai_an_db WHERE id=:id";
// prepareメソッドに渡している
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
// excuteで実行
$status = $stmt->execute();


//データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //データのみ抽出の場合はwhileループで取り出さない
$row = $stmt->fetch();
// $row = ["id"],$row = ["name"]...などで表示d
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="result.php">アンケート結果</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<form method="get" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></label><br>

     <tr>
              
                <td>年齢</td>
                <td>
                    <select name="age2" value="<?=$row["age2"]?>">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                    </select>
                </td>                
            </tr>
 <input type="hidden" name="id" value="<?=$row["id"]?>">
     
     
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>



</body>
</html>