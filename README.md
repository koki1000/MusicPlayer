<h1>音楽再生アプリ</h1>

<h2>アプリケーション名</h2>
<div>
<p>MusicPlayer</p>
</div>

<h2>概要</h2>
<div>
<p>楽曲再生するアプリです。<br>
ユーザーごとにプレイリストを作成するため、会員登録・ログイン・楽曲追加の機能があります。
</p>
</div>
<img width="1440" alt="スクリーンショット 2022-07-06 16 09 35" src="https://user-images.githubusercontent.com/108777169/177490686-ca3eddef-27f9-4cb0-a7d9-a8e707ab6d2c.png">

<h2>作成した目的</h2>
<div>
<p>
音楽鑑賞が好きであり自分のスキルでも作れそうだと思ったため
</p>
<p>
プレイヤー部分の再生・停止・一時停止やシークバー操作などをどのように記述すればよいか、興味があったため
</p>
</div>

<h2>注意事項</h2>
<div>
<ul>
    <li>
    会員登録時には名前、メールアドレス（＠含む）必須
    </li>
    <li>
    楽曲追加時には、楽曲名、アーティスト名、ファイル名必須
    </li>
    <li>
    アップロードするファイルのサイズに合わせて、php.iniを設定する（確認項目はfile_uploads、post_max_size、max_file_uploads、upload_max_filesize）
    </li>
    <li>
    アップロード可能なファイル形式はmp3,wav,wave,aif,aac,mp4の6種類
    </li>
    <li>
    対応ブラウザ：Safari、FireFoxなど（他のブラウザでもシークバー操作以外は可能です。）
    </li>
    <li>
    playlistディレクトリにmp3ファイルが２つ入っていますので、楽曲追加ページにてアップロードをお願いいたします。
    </li>
</ul>
</div>

<h2>機能一覧</h2>
<div>
<ul>
    <li>
    会員登録機能
    </li>
    <li>
    ログイン機能
    </li>
    <li>
    楽曲再生・一時停止・停止
    </li>
    <li>
    シークバー操作、音量調節機能
    </li>
    <li>
    楽曲追加機能
    </li>
</ul>
</div>

<h2>使用技術（実行環境）</h2>
<div>
<ul>
    <li>
    Laravel Framework 8.83.12
    </li>
    <li>
    PHP 8.1.5
    </li>
</ul>
</div>

<h2>テーブル設計</h2>
<img width="1440" alt="スクリーンショット 2022-07-25 23 21 41" src="https://user-images.githubusercontent.com/108777169/180800358-a69ee771-3d55-4f8b-bcd7-edf722331091.png">


<h2>ER図</h2>
<img width="1440" alt="スクリーンショット 2022-07-25 23 24 22" src="https://user-images.githubusercontent.com/108777169/180800438-ad180e38-488c-4ba4-b55b-79abaf24a077.png">

