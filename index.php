<?php
$emojis = mb_split('\n', file_get_contents('emoji.txt'));
?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Emoji</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="bootstrap.min.css" media="all">
  <meta property="og:title" content="Emoji">
  <meta property="og:description" content="Emoji as a Service">
  <meta property="og:image" content="https://i.imgur.com/MuLr0Sa.png">
  <meta property="og:url" content="https://inndy.tw/emoji/">
  <style>
    body {
      background-color: #333;
      color: #eee;
      padding-top: 2.5em;
    }

    .jumbotron {
      background: #666;
      text-align: center;
    }

    .emojis > div {
      padding: .5em;
    }

    .emojis > div > .btn {
      font-size: 1.3em;
      text-align: center;
      overflow: hidden;
      padding: .6em .5em;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1>(´･_･`)</h1>
    </div>
  </div>

  <div class="emojis container">
<?php foreach($emojis as $emoji): if(mb_strlen($emoji) == 0) continue; ?>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
      <button class="btn btn-success btn-block" data-clipboard-text="<?=htmlentities($emoji)?>"><?=htmlentities($emoji)?></button>
    </div>
<?php endforeach; ?>
  </div>
  <script src="clipboard.min.js"></script>
  <script>
    var emojis = document.querySelectorAll('.emojis .btn')
    var h1 = document.querySelector('h1')
    h1.innerText = emojis[~~(Math.random() * emojis.length)].innerText

    var clipboard = new Clipboard('.btn')

    clipboard.on('success', function(e) {
      h1.innerText = e.text

      console.info('Action:', e.action)
      console.info('Text:', e.text)
      console.info('Trigger:', e.trigger)

      e.clearSelection()
    });

    clipboard.on('error', function(e) {
      console.error('Action:', e.action)
      console.error('Trigger:', e.trigger)

      alert('Can not copy text')
    });
  </script>
</body>
</html>
