let playFlag = false; // 再生中か否かを表すフラグを定義
let playing_ttl = document.getElementById('playing_ttl'); //再生中の楽曲
let playbtn = document.getElementById('play_btn'); //再生ボタン
let pausebtn = document.getElementById('pause_btn'); //一時停止ボタン
let stopbtn = document.getElementById('stop_btn'); //停止ボタン
let crtTime = document.getElementById('timeviewr'); // 再生時間表示部分
let seek = document.getElementById('seekbar');
//シークバー

// 音楽ファイルを連想配列に格納
let fileList = [
  {name: "Ravey Sit", artist: "DJ Myosuke", url:'/DJ Myosuke - Ravey Sit.mp3'},
  { name: "Lau-Fi", artist: "Laur", url: '/Laur - Lau-Fi.mp3' },
  {name: "Keep Tryin", artist: "宇多田ヒカル", url: '/宇多田ヒカル - Keep Tryin.mp3'},
];

let playList = '<ul>';
for (let i = 0; i < fileList.length; i++){
    playList += '<li>' + fileList[i].name + ' / ' + fileList[i].artist + '</li>';
}
playList += '</ul>';

document.getElementById("playList").innerHTML = playList;

const dir = './playList';
let url = null;
let Music = new Audio(url);//初期値

$(function List_Click() {
  $('li').on('click', function () {
    let idx = $(this).index();
    let now_file_url = fileList[idx].url;

    if (playFlag == false) {
      Music = new Audio(dir + now_file_url);
    } else {
      Music.pause();
      Music = new Audio(dir + now_file_url);
    };

    Music.addEventListener('timeupdate', function () {
        let sec = '0' + Math.floor(Music.currentTime % 60); // 秒数
        let min = '0' + Math.floor(Music.currentTime / 60); // 分数
        sec = sec.substr(sec.length-2, 2);
        min = min.substr(min.length - 2, 2);

        let totalSec ='0' + Math.floor(Music.duration % 60); //秒数
        let totalMin ='0' + Math.floor(Music.duration / 60); //分数
        totalSec = totalSec.substr(totalSec.length-2, 2);
        totalMin = totalMin.substr(totalMin.length - 2, 2);

        crtTime.innerHTML = min + ":" + sec + '/' + totalMin + ':' + totalSec;

        let percent = Math.round((Music.currentTime/Music.duration)*1000)/10
        seek.style.backgroundSize = percent + '%';
    });//時間のカウント
    Music.play(); // 音楽を再生
    playing_ttl.innerHTML = fileList[idx].name + ' / ' + fileList[idx].artist;// 再生中タイトルの表示
    playFlag = true; // 再生中フラグを立てる
    playbtn.style.display = "inline-block";
    pausebtn.style.display = "none"; // ボタンをplay→pauseに変化
    seek.style.display = "inline-block";
    console.log(Music);
  });
});//リストをクリックすると再生する


// 再生/一時停止機能
//再生ボタン
$(function Play() {
  // pauseボタンをクリックした時
  pausebtn.addEventListener('click', function () {
    Music.addEventListener('timeupdate', function(){
        let sec = '0' + Math.floor(Music.currentTime % 60); // 秒数
        let min = '0' + Math.floor(Music.currentTime / 60); // 分数
        sec = sec.substr(sec.length-2, 2);
        min = min.substr(min.length - 2, 2);

        let totalSec ='0' + Math.floor(Music.duration % 60); //秒数
        let totalMin ='0' + Math.floor(Music.duration / 60); //分数
        totalSec = totalSec.substr(totalSec.length-2, 2);
        totalMin = totalMin.substr(totalMin.length - 2, 2);

        crtTime.innerHTML = min + ":" + sec + '/' + totalMin + ':' + totalSec;

      let percent = Math.round((Music.currentTime / Music.duration) * 1000) / 10;
      seek.style.backgroundSize = percent + '%';
    });//時間のカウント
    playFlag = true; // 再生中フラグを立てる
    Music.play(); // 音楽を再生
    playbtn.style.display = "inline-block";
    pausebtn.style.display = "none"; // ボタンをPause→Playに変化
    console.log(Music);
  });
});

//一時停止ボタン
$(function Pause() {
  // 再生されているとき、playボタンを押すと一時停止
  playbtn.addEventListener('click', function () {
    playFlag = false;
    Music.pause();
    playbtn.style.display = "none";
    pausebtn.style.display = "inline-block"; // ボタンを押すとPlay→Pauseにボタンを変化
    console.log(Music);
  });
});

// 停止ボタン
$(function Stop(){
    stopbtn.addEventListener('click', function(){
      Music.pause();
      Music.currentTime = 0; // 経過時間を0にして完全停止
      ClearPlayer();
      console.log(Music);
  });
});

//シークバー
$(function Seek() {
  seek.addEventListener('click', (e) => {
    let duration = Math.round(Music.duration)
    if (!isNaN(duration)) {
      let mouse = e.pageX
      let rect = seek.getBoundingClientRect()
      let position = rect.left + window.pageXOffset//ビューポート内位置＋スクロール量（一応）
      let offset = mouse - position
      let width = rect.right - rect.left
      Music.currentTime = Math.round(duration * (offset / width))
    };
  });
});

// 曲の再生が終わった時、最初の状態に戻す
$(function end(){
  Music.addEventListener('ended', function(){
    ClearPlayer();
    playbtn.style.display = "none";
    pausebtn.style.display = "inline-block";
  });
});

// 曲を停止したときオーディオをリセットする
let ClearPlayer = function(){
  playFlag = false;
  crtTime.innerHTML = "00:00"
  playbtn.style.display = "none";
  pausebtn.style.display = "inline-block";
};

// ボリューム調整のスライダー
$(function Slider() {
  $('#volume').slider({
    min: 0,
    max: 100,
    value: 50, //デフォルト値
    range: 'min', // min方向に色を付ける
    change: function () {
      let value = $('#volume').slider('value'); // デフォルト値を受け取る
      Music.volume = (value / 100); // 受け取った値を100で割る
    },
  });
});