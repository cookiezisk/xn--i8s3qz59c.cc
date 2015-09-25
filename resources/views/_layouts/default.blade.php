<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>小王子</title>

  {{ HTML::style('css/app.css') }}
  {{ HTML::style('css/main.css') }}
  {{ HTML::style('css/markdown/markdown.css') }}

  {{ HTML::script('js/jquery/jquery.js') }}

  <!-- Fonts -->
  <link href='http://fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <!-- <audio src="/audio/banana.mp3" controls="controls" autoplay="autoplay" style="display: none">Your browser does not support the audio element.</audio> -->
  <div id="wrap">
    <div id="header">
      <a href="//www.小王子.cc">
        <img src="http://www.小王子.cc/xwz_logo.png" id="logo" alt="LOGO">
        <h1 id="title">小王子</h1>
      </a>
      <h3 id="slogan">{{ Inspiring::quote() }}</h3>
    </div>
  </div>
  <div id="nav" class="navbar-wrapper">
    <div class="container">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.小王子.cc/">小王子</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="bar nav navbar-nav">
              <li class="item common">
                <a href="/">文章</a>
              </li>
              <li class="item common">
                <a href="/">留言</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container">
    @yield('content')
    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 20px;">
      ©2015 <a href="//www.小王子.cc">AndySui</a>
    </div>
  </div>
</body>
</html>