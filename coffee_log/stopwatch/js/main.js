(function() { //即時関数
  // 'use strict';

  // var watch = document.getElementByID('watch');
  var start = document.getElementByID('start');
  var stop = document.getElementByID('stop');
  var reset = document.getElementByID('reset');

  var startTime; //スタート時の現在時刻を設定するための変数
  var elapsedTime = 0; //ラップタイムを設定するための変数

/*
  スタートからの経過時間を計算するための関数を用意する
*/
  function countUp(){ //数字を加算していく関数
    setTimeout(function(){ //setTimeoutは、一定時間後（今回は10ミリ秒後）に以下の処理を行う関数
      elapsedTime = Date.now() - startTime;
      console.log(elapsedTime);
      countUp();
    },10)
  }

/*startボタンがクリックされたら、function以下の関数処理を行います！
　（現在時刻を基準に秒数が加算されていく処理）*/
  start.addEventListener('click',function(){
    startTime = Date.now();
    countUp();
  });
  })();
