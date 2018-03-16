<?php
// 0.GETでid値を取得
$id = $_GET["id"];



//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=coffee_log;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所
$sql = "SELECT * FROM log_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt ->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view=""; //受け取るための変数を事前に作ります。
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //1データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt ->fetch();
  //$row["$id"], $row["$name"]...

}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>珈琲ログ</title>
</head>

<body>

<!-- Head[Start] -->
<header>
  <nav class="header">
    <div class="header-link"><a href="select.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form action="update.php" method="POST">
  <fieldset>
    <legend>記録内容</legend>
    <ul>
      <li><label>豆の種類 <input type="text" name="area" list="area_data" value="<?php echo $row["area"]; ?>"></label> </li>
      <li><label>色合い<select name="color"> <?php echo $row["color"]; ?>
        <option value="">選択して下さい</option>
        <option value="thin">薄い</option>
        <option value="normal">普通</option>
        <option value="dark">濃い</option>
        </select></label></li>
      <li> <label>焙煎度 <select name="roast"> <?php echo $row["roast"]; ?>
        <option value="">選択して下さい</option>
        <option value="midium">ミディアムロースト</option>
        <option value="city">シティロースト</option>
        <option value="french">フレンチロースト</option>
        </select></label></li>
      <li><label>抽出器具 <select name="way"> <?php echo $row["way"]; ?>
        <option value="">選択して下さい</option>
        <option value="paper">ペーパードリップ</option>
        <option value="metal">金属フィルター</option>
        <option value="Bialetti">ビアレッティ</option>
        </select></label></li>
      <li><label>抽出時間 <input type="text" name="seconds" value="<?php echo $row["seconds"]; ?>"></label></li>
      <li><label>特徴 <textarea name="feature" rows="4" cols="40" placeholder="詳細を記入してください。"> <?php echo $row["feature"]; ?></textarea></label></li>
      <li><label>評価 <select name="rank"> <?php echo $row["rank"]; ?>
        <option value="">選択して下さい</option>
        <option value="SS">SS</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        </select></label></li>
    </ul>
    <input type="hidden" name="id" value="<?php echo ["id"]; ?>">
  </fieldset>
  <input type="submit" value="登録">
</form>

<datalist id="area_data" name="area">
  <option value="アフリカ"></option>
  <option value="アジア・オセアニア"></option>
  <option value="南アメリカ"></option>
  </datalist>







<!-- Main[End] -->

</body>

</html>
