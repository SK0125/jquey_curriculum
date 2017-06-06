<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>jQuery</title>
<link rel="stylesheet" href="../../common/css/reset.css">
<link rel="stylesheet" href="../../common/css/base.css">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="wrapper">
  <ul class="colorList"></ul>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
// 今回のカリキュラムではAjax（XMLHttpRequest）というJavaScriptの特殊な機能を使います。
// この機能はブラウザのセキュリティ機能によってはサーバーを立てないとうまく動作しない可能性があるので、サーバーを立てる必要があります。
// ターミナルで`jquery-curriculum`に移動したあとに`open -a '/Applications/Google Chrome.app' http://localhost:8000/work/ninth/ && python -m SimpleHTTPServer 8000`を叩くとサーバを立てることができます。またブラウザも勝手に立ち上がります。サーバーを止める方法はターミナルでcontrol + cを打つと止まります。
//
// [使うメソッド]
// .html() 要素の中に引数を代入する。
// $.ajax({}) 外部ファイルやURLに対してデータをリクエストすることができます。これだけだと少しわからないと思うので下に文法を書いておきます。
//
// [文法]
// $.ajax({
//   url: './data.json'
// })
// .done(function(data) {
//   console.log(data);
// });
//
// 今回の場合は同じ階層にあるdata.jsonに対してリクエストを飛ばして、中にあるオブジェクトを取得します。
// そのオブジェクトは
// .done(function(data) {
//                  ↑
//           ここに入ってきます。
//
// そのため、次の行でconsole.log(data)をすると中身のオブジェクトが確認できます。
//
// [テンプレート]
// <li class="colorList__item">
//   <p class="colorList__title" style="background-color: ;"></p>
// </li>
//
// このテンプレートに取得してきたオブジェクトを流し込みます。

// $(function() {
//   $.ajax({
//     url: './data.json'
//   })
//   .done(function(data) {
//     console.log(data);
//   });
// });


// $(function() {
//   $.ajax({
//     url:'./data.json'
//   })
//   .done(function(data) {
//     for(var a=data.colorArry.length(),d="",i=0; i<a; i++) {
//       d+='<li class="colorList__item"><p class="colorList__title" style="background-color: '+a[i].hexValue+';">'+a[i].colorName+"</p></li>";
//     $('.colorList').html(d);
//     }
//   });
// });

$(function(){
  $.ajax({
    url:'./data.json'
  })
  .done(function(data) {
    //var d = '';

    for( var i = 0; i < data.colorsArray.length; i++ ) {
        var d = '<li class="colorList__item"><p class="colorList__title" style="background-color:'
       //d += '<li class="colorList__item"><p class="colorList__title" style="background-color:'
            + data.colorsArray[i].hexValue
            +' ;">'
            + data.colorsArray[i].colorName
            + '</p></li>';
        $('.colorList').append(d);
    }
        // $('.colorList').html(d);
    // console.log(data);
    // console.log(data.colorsArray[0]);
    // console.log(data.colorsArray.length);
  });
});

</script>
</body>
</html>
