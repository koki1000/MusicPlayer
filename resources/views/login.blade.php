<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/login.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  @endif
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Joan&family=M+PLUS+Rounded+1c:wght@500&display=swap"
    rel="stylesheet">
  <title>ログイン</title>
</head>
<body>
  
  <div class="form">
    <div>
      <p class="login">ログイン</p>
    </div>
    <form action="/" method="post">
    @csrf  
    <div>
      <input type="email" name="email" placeholder="メールアドレス">
      @error('email')
      <p class="message">{{$message}}</p>
      @enderror
    </div>
    <div>
      <input type="text" name="password" placeholder="パスワード">
      @error('password')
      <p class="message">{{$message}}</p>
      @enderror
    </div>
    <div><button>ログイン</button></div>
    </form>
    <div>
      <p class="link_text">アカウントをお持ちでない方はこちらから</p>
      <p class="link"><a href="/register">会員登録</a></p>
    </div>
    <div>
      <p>{{$text1}}</p>
      <p>{{$text2}}</p>
    </div>
  </div>

</body>
</html>