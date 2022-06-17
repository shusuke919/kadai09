<?php
session_start();
//includeで関数を呼び出す　require_once('funcs.php');＝include("funcs.php");どちらでもOK
include("funcs.php");


//DBへ接続
$pdo = db_connect();

loginCheck();



$sql = "SELECT count(*) as count, age2 FROM kadai_an_db group by age2;";
$stmt = $pdo->prepare($sql);
 //execute（SQL実行時にエラーがある場合）
$status = $stmt->execute();
//fetchAll_ASSOC = foreachで回す$resultは複数行を想定している
//fetchAll_ASSOC = カラム名を添字にした配列形式（連想配列）でデータを格納
//https://takablog06.com/php_fetch_for_beginner/
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//jsに入れるための変数を作　10代〜70代までを作成
//array_search配列を検索


//確認
// echo"<pre>";
// var_dump($result);
// echo"</pre>";

$key1 = array_search(1, array_column($result, 'age2'));
$a = $result[$key1];

$key2 = array_search(2, array_column($result, 'age2'));
$b = $result[$key2];

$key3 = array_search(3, array_column($result, 'age2'));
$c = $result[$key3];

$key4 = array_search(4, array_column($result, 'age2'));
$d = $result[$key4];

$key5 = array_search(5, array_column($result, 'age2'));
$e = $result[$key5];

$key6 = array_search(6, array_column($result, 'age2'));
$f = $result[$key6];

$key7 = array_search(7, array_column($result, 'age2'));
$g = $result[$key7];

//確認
// echo"<pre>";
// var_dump($g);
// echo"</pre>";


// int=>strに変換するサーバーサイドでenum定義が必要
$enum = [
  1 => "10代",
  2 => "20代",
  3 => "30代",
  4 => "40代",
  5 => "50代",
  6 => "60代",
  7 => "70代"
];

//データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {

  // foreach文は配列に含まれる各要素の値を順に取り出し処理したい場合に使う
  $view .= "年齢別一覧";

  foreach($result as $v){
  
    $view .= '<p>';
    //foreachループ内の $v["age"] がenumのkeyに対応するのでvalueは $enum[(int) $v["age"]]で取得可能
    $view .= "年齢：".$enum[(int) $v["age2"]]."：";
    $view .= $v["count"]."人";
    $view .= '</p>';
   
  }
  
}

?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
　<title>グラフ</title> 
</head>
<body>

  <div>
    
    <a><?=$view?></a>
    <a href="result.php">アンケート結果一覧に戻る</a>
</div>


  <canvas id="myPieChart"></canvas>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

  <script>

// echoの出力対象をjson_encodeでjavascriptのobjectに変換
// https://qiita.com/cr_tk/items/900914e8a6e19ee3c5b7
 var  js_a = <?php echo json_encode($a); ?>;
 var  js_b = <?php echo json_encode($b); ?>;
 var  js_c = <?php echo json_encode($c); ?>;
 var  js_d = <?php echo json_encode($d); ?>;
 var  js_e = <?php echo json_encode($e); ?>;
 var  js_f = <?php echo json_encode($f); ?>;
 var  js_g = <?php echo json_encode($g); ?>;

 var results = <?php echo json_encode($result); ?>;

var data = Array.from(Array(7), (v, k) => {
    var result = results.find((elm) => elm.age == k + 1);
    if(result == undefined) {
        return 0;
    } else {
        return parseInt(result.count);
    }
});

// chart.jsを使用する
// https://qiita.com/cr_tk/items/900914e8a6e19ee3c5b7
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["10代", "20代", "30代", "40代","50代","60代","70代"],
      datasets: [{
          backgroundColor: [
              "#BB5179",
              "#FAFF67",
              "#58A27C",
              "#3C00FF"
          ],
          data: [
            js_a.count,
            js_b.count,
            js_c.count,
            js_d.count,
            js_e.count,
            js_f.count,
            js_g.count,
                       ]
      }]
    },
    options: {
      title: {
        display: true,
        text: '血液型 割合'
      }
    }
  });
  </script>
</body>
</html>