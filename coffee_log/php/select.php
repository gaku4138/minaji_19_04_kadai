<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=coffee_log;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所
if ($rank = 'SS') {
  $stmt = $pdo->prepare("SELECT * FROM log_table ORDER BY rank DESC");
  $status = $stmt->execute();
}else{
  $stmt = $pdo->prepare("SELECT * FROM log_table ORDER BY id DESC" );
  $status = $stmt->execute();
}

// ３．データ表示
  // $view=""; //受け取るための変数を事前に作ります。
 if($status==false){
   //execute（SQL実行時にエラーがある場合）
   $error = $stmt->errorInfo();
   exit("ErrorQuery:".$error[2]);

 }else{
   //Selectデータの数だけ自動でループしてくれる(11行目で取ってきたデータ)
   while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
     $view .= "<p>";
     $view .='<a href="u_view.php?id='.$result["id"].'">';
     $view .= $result ["rank"]." : ".$result["area"]." : ".$result["color"]." : ".$result["roast"]." : ".$result["way"]." : ".$result["seconds"]
              ." : ".$result["feature"];
     $view .='</a>';
     $view .= "</p>";
   }

 }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>集計結果</title>
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
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <!-- ここで先程の$viewを埋め込むことでHTML上に呼び出すことができます -->
    <div class="container jumbotron"><?= $view ?>

    </div>
</div>
<!-- Main[End] -->


</body>
</html>
