<!-- キーワード検索機能 (likeであいまい検索 for foreachで複数検索)-->


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="" href="log.css"> -->
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
  <form action="insert.php" method="post" id="wrap">
    <fieldset>
      <legend>記録内容</legend>
      <ul>
        <li><label>豆の種類 <input type="text" name="area" list="area_data"></label> </li>
        <li><label>色合い<select name="color">
          <option value="">選択して下さい</option>
          <option value="thin">薄い</option>
          <option value="normal">普通</option>
          <option value="dark">濃い</option>
          </select></label></li>
        <li> <label>焙煎度 <select name="roast">
          <option value="">選択して下さい</option>
          <option value="midium">ミディアムロースト</option>
          <option value="city">シティロースト</option>
          <option value="french">フレンチロースト</option>
          </select></label></li>
        <li><label>抽出器具 <select name="way">
          <option value="">選択して下さい</option>
          <option value="paper">ペーパードリップ</option>
          <option value="metal">金属フィルター</option>
          <option value="Bialetti">ビアレッティ</option>
          </select></label></li>
        <!-- <li><label>抽出時間 <input type="text" name="seconds"></label></li> -->
        <li><label>抽出時間 <p id="text" name="seconds">
       <span id="min">0</span>min
       <span id="sec">00.00</span>sec</p>
     <input type="button" id="start" value="Start">
     <input type="button" id="stop" value="Stop">
     <input type="button" id="reset" value="Reset"></label></li>
        <li><label>特徴 <textarea name="feature" rows="4" cols="40" placeholder="詳細を記入してください。"></textarea></label></li>
        <li><label>評価 <select name="rank">
          <option value="">選択して下さい</option>
          <option value="SS">SS</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          </select></label></li>


      </ul>
    </fieldset>
    <input type="submit" value="登録">
  </form>


  <datalist id="area_data" name="area">
    <option value="アフリカ"></option>
    <option value="アジア・オセアニア"></option>
    <option value="南アメリカ"></option>
    </datalist>







  <!-- Main[End] -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/main.js" charset="utf-8"></script>
</body>

</html>
