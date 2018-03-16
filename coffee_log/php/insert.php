<?php
//index.phpのformから送られてきたデータを変数で受け取ります.
//1. POSTデータ取得
$area   = $_POST["area"];
$color  = $_POST["color"];
$roast = $_POST["roast"];
$way = $_POST["way"];
$seconds = $_POST["seconds"];
$feature = $_POST["feature"];
$rank = $_POST["rank"];



//2. DB接続します
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=coffee_log;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 ここはDBに実際にsqlを実行して登録する箇所です
//xxx(テーブル名)はテーブル名を入力します\
$stmt = $pdo->prepare("INSERT INTO log_table(id, area, color, roast, way, seconds, feature, rank, indate )
VALUES(NULL, :a1, :a2, :a3, :a4,:a5,:a6,:a7,sysdate())");
//$xxxxには上で受け取った変数名を入れます
$stmt->bindValue(':a1', $area);
$stmt->bindValue(':a2', $color);
$stmt->bindValue(':a3', $roast);
$stmt->bindValue(':a4', $way);
$stmt->bindValue(':a5', $seconds);
$stmt->bindValue(':a6', $feature);
$stmt->bindValue(':a7', $rank);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクトとは処理が終わったら指定しているページに画面遷移させること
  header("Location: index.php");
  exit;

}
?>
