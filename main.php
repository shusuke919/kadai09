<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link rel="stylesheet" href="style.css">
  
  
</head>
<body>

  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="result.php">アンケート結果</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="qu.php">集計</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<main>
<form method="get" action="form_get.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>Email：<input type="text" name="email"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>

     <tr>
              
                <td>年齢</td>
                <td>
                    <select name="age2">
                        <option value="1">10代</option>
                        <option value="2">20代</option>
                        <option value="3">30代</option>
                        <option value="4">40代</option>
                        <option value="5">50代</option>
                        <option value="6">60代</option>
                        <option value="7">70代</option>
                    </select>
                </td>                
            </tr>

     
     
     <input type="submit" value="送信">
    </fieldset>
  </div>
  </main>
</form>
</body>
</html>