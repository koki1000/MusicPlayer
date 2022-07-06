<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/register.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/register.css') }}" rel="stylesheet">
  @endif
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Joan&family=M+PLUS+Rounded+1c:wght@500&display=swap"
    rel="stylesheet">
  <title>会員登録</title>
</head>
<body>
  <div class="form">
    <div class="ttl">
      <p class="register">会員登録</p>
    </div>
    <div>
      <form action="/register" method="post">
      @csrf
      <input type="hidden" name="id">
      <div><input type="text"  name="name" placeholder="名前" value="{{old('name')}}">
      @error('name')
      <p class="message">{{$message}}</p>
      @enderror
      </div>
      <div><input type="email"  name="email" placeholder="メールアドレス" value="{{old('email')}}">
      @error('email')
      <p class="message">{{$message}}</p>
      @enderror
      </div>
      <div><input type="text"  name="password" placeholder="パスワード" required></div>
      <div><input type="text"  name="password_confirmation" placeholder="確認用パスワード" required>
      @error('password')
      <p class="message">{{$message}}</p>
      @enderror
      </div>
      <div><button>会員登録</button></div>
      </form>
    </div>
    <div>
      <p class="link_text">アカウントをお持ちの方はこちらから</p>
      <p class="link"><a href="/login">ログイン</a></p>
    </div>
  </div>
</body>
</html>