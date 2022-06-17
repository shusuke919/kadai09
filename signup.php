<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <header>
  <div class="container-fluid">
  <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
  <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
  </div>
  </header>

  <main>
  <form method="get" action="sign_get.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
     <label>name：<input type="text" name="name"></label><br>
     <label>id：<input type="text" name="lid"></label><br>
     <label>pass：<input type="text" name="lpw"></label><br>

     
     
     <input type="submit" value="送信">
    </fieldset>
  </div>
 
</form>
  </main>
</body>
</html>