<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script type = "text/javascript" > <!--
    myButton = 0; // [Start]/[Stop]のフラグ
  function myCheck() {
    if (myButton == 0) { // Startボタンを押した
      myStart = new Date(); // スタート時間を退避
      myButton = 1;
      document.myForm.myFormButton.value = "Stop!";
      myInterval = setInterval("myDisp()", 1);
    } else { // Stopボタンを押した
      myDisp();
      myButton = 0;
      document.myForm.myFormButton.value = "Start";
      clearInterval(myInterval);
    }
  }

  function myDisp() {
    myStop = new Date(); // 経過時間を退避
    myTime = myStop.getTime() - myStart.getTime(); // 通算ミリ秒計算
    myH = Math.floor(myTime / (60 * 60 * 1000)); // '時間'取得
    myTime = myTime - (myH * 60 * 60 * 1000);
    myM = Math.floor(myTime / (60 * 1000)); // '分'取得
    myTime = myTime - (myM * 60 * 1000);
    myS = Math.floor(myTime / 1000); // '秒'取得
    myMS = myTime % 1000; // 'ミリ秒'取得
    document.myForm.myFormTime.value = myH + ":" + myM + ":" + myS + ":" + myMS;
  }
</script>
</head>

<body>
  <!-- <div id="Timer">00:00.000</div>
  <button id="start">Start</button>
  <button id="stop">Stop</button>
  <button id="reset">Reset</button>
  <script src="main.js"></script> -->

  <form name="myForm">
    <input type="text" size="28" name="myFormTime">
    <input type="button" value="Start" name="myFormButton" onclick="myCheck()">
  </form>
</body>

</html>
