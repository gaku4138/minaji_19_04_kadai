<?php
// 0.POSTでid値を取得
$id      = $_POST["id"];
$area    = $_POST["area"];
$color   = $_POST["color"];
$roast   = $_POST["roast"];
$way     = $_POST["way"];
$seconds = $_POST["seconds"];
$feature = $_POST["feature"];
$rank    = $_POST["rank"];



//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=coffee_log;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．UPDATE テーブル名 SET....; で更新(bindValue)
//作ったテーブル名を書く場所
$sql = "UPDATE log_table SET area=:area, color=:color, roast=:roast, way=:way, seconds=:seconds, feature=:feature, rank=:rank WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt ->bindValue(':area',      $area,      PDO::PARAM_STR);
$stmt ->bindValue(':color',     $color,     PDO::PARAM_STR);
$stmt ->bindValue(':roast',     $roast,     PDO::PARAM_STR);
$stmt ->bindValue(':way',       $way,       PDO::PARAM_STR);
$stmt ->bindValue(':seconds',   $seconds,   PDO::PARAM_INT);
$stmt ->bindValue(':feature',   $feature,   PDO::PARAM_STR);
$stmt ->bindValue(':rank',      $rank,      PDO::PARAM_STR);
$stmt ->bindValue(':id',        $id,        PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ登録処理後
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //SELECT.phpへリダイレクト
  header("Location: select.php");
  exit;
}


// DELETE文を変数に格納
$sql = "DELETE FROM log_table WHERE id = :id";

// 削除するレコードのIDは空のまま、SQL実行の準備をする
$stmt = $dbh->prepare($sql);

// 削除するレコードのIDを配列に格納する
$params = array(':id'=>5);

// 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);

// 削除完了のメッセージ
echo '削除完了しました';
?>
