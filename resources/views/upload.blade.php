<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/upload.css') }}" rel="stylesheet">
  @else
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/upload.css') }}" rel="stylesheet">
  @endif
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Joan&family=M+PLUS+Rounded+1c:wght@500&display=swap"
    rel="stylesheet">
  <title>楽曲追加</title>
</head>

<body>

  <div class="form">
    <div>
      <p class="add">楽曲追加</p>
    </div>
    <form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value={{$user_id}}>
    <div>
      <input type="text"  name="title" placeholder="楽曲" value="{{old('title')}}">
      @error('title')
      <p class="message">{{$message}}</p>
      @enderror
    </div>
    <div>
      <input type="text"  name="artist" placeholder="アーティスト" value="{{old('artist')}}">
      @error('artist')
      <p class="message">{{$message}}</p>
      @enderror
    </div>
    <div>
      <input type="file" name="file" required>
    </div>
    <div>
      @error('file')
      <p class="message">{{$message}}</p>
      @enderror
    </div>
    <div>
      <button>アップロード</button>
    </div>
    </form>
  </div>

</body>