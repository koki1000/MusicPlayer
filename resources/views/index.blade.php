<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
  <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('css/index.css') }}" rel="stylesheet">
  @else
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
  @endif
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Joan&family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
  <title>再生ページ</title>
</head>

<body>

  <div class="index_container">
    <div class="text">
      <p>{{$user_name}}さんおかえりなさい！</p>
    </div>
    <!-- コントローラー部分 -->
    <form class='audioform'>
      <!--再生曲表示部分-->
      <div id="playing_ttl_container" class='playing_ttl_container'>
        <p class="playing_ttl" id="playing_ttl"></p>
      </div><br>
      <div class="box">
        <!-- ボタン -->
        <div class="btns">
          <button type="button" id="play_btn" class='play_btn'></button>
          <button type="button" id="pause_btn" class='pause_btn'></button>
          <button type="button" id='stop_btn' class="stop_btn"></button>
        </div>
        <!--シークバー-->
        <div id='seekbar' class="seekbar"></div>
        <!--再生時間表示部分-->
        <div class="timeviewr" id='timeviewr'>ーー/ーー</div>
      </div>

      <!--スライダー設置部分-->
      <div class="volume_box" id='volume_box'>
        <div class="icon_box" id='icon_box'>
          <img src="{{ asset('image/img/音声.jpg') }}" class="icon-volume">
        </div>
        <div class="volume" id='volume'>
        </div>
      </div>
    </form>

    <!--プレイリスト設置部分-->
    <div id="playListAria" class="playListAria">
      <div id="playList_ttl" class="playList_ttl">
        <p>PlayList</p>
      </div>
      @foreach ($items as $item)
      @if ($item->music != null)
      <div id="playList" class="playList">
        <ul>
          @foreach ($item->music as $obj)
          <li>
            <p class="music_ttl">
              {{ $obj->getTitle() }}
            </p>
            <p class="file_path" >
              ./storage/{{ $obj->getFileName() }}
            </p>
          </li>
          @endforeach
        </ul>
      </div>
      @endif
      @endforeach
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!--最後にjsファイルを読み込む-->
    <script src="{{ asset('/js/music.js') }}"></script>
  </div>

</body>

</html>