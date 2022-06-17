<?php
function h($val){
return htmlspecialchars($val,ENT_QUOTES);
}

//LOGIN認証チェック関数
function loginCheck(){
  //session IDをチェックする
if(
      !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
        echo "LOGIN Error!";
        exit();
      }else{
        //認証ができていればsession_idを毎回変えることを書く
        session_regenerate_id(true);
        $_SESSION["chk_ssid"]= session_id();
        //session_idが毎回変わるか確認
        echo $_SESSION["chk_ssid"];
      }
}


//DB接続
function db_connect(){
  try{
    $pdo = new PDO('mysql:dbname=kadai_db;charset=utf8;host=localhost:3306','root','root');
  }catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  //関数の外に出す　戻り値
  return $pdo;
}
?>