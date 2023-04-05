<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'firefox') !== false) && (strpos($ua, 'Mobilse') !== false) || (strpos($ua, 'Windows Phone') !== false)) { ?><?php } elseif ((strpos($ua, 'iPad') !== false) ||(strpos($ua, 'iPhone') !== false) ||(strpos($ua, 'iPod') !== false) || (strpos($ua, 'MacIntel') !== false) && navigator.maxTouchPoints > 1) {?><?php } elseif (strpos($ua, 'Android') !== false) { ?><?php } else { ?><link rel="preload" href="./js/jquery.nicescroll.min.js?<?php echo date('Ymd-Hi'); ?>" crossorigin="" referrerpolicy="no-referrer" as="script"><script src="./js/jquery.nicescroll.min.js?<?php echo date('Ymd-Hi'); ?>" crossorigin="" referrerpolicy="no-referrer"></script><style>div[id^='ascrail']{-webkit-overflow-y:hidden;-moz-overflow-y:hidden;overflow-y:hidden;z-index:201;-moz-border-radius:100vh;-webkit-border-radius:100vh;border-radius:100vh;display:block;background:rgb(221,221,221);width:100%;overflow-x:hidden;-moz-overflow-x:hidden;-webkit-overflow-x:hidden;width:inherit;opacity:0;-webkit-transition:1.0s;-moz-transition:1.0s;transition:1.0s}.nicescroll-cursors{positon:relative!important;/*max-height:7em;*/}body{overflow:auto!important;}</style>
<script>
$(document).ready(function(){
    $("body").niceScroll({cursorborder:"1px solid rgba(9, 164, 241, 0.7)",cursorcolor:"#7fb1ea",cursorwidth:"12px",cursoropacitymax:"0.7",cursoropacitymin:"0.4",cursorborderradius:"100vh",scrollspeed: 50,mousescrollstep:30,zindex:"201",background:"#ea9b7f61",disablemutationobserver:true,oneaxismousemode:"auto",autohidemode:true,hidecursordelay:400,horizrailenabled:false,cursorfixedheight:false,cursorminheight:20,enablekeyboard:true,bouncescroll:false,smoothscroll:true,iframeautoresize:true,touchbehavior:false,enableobserver:true});
    });


$("body").getNiceScroll().resize();
</script>

<?php };
echo '<link rel="stylesheet" href="css/lite-yt-embed.min.css" />
<script src="js/lite-yt-embed.min.js" defer/></script>
<script>
var time=new Date().getTime();
$(function() {
var h = $(window).height();

$(".wrap").css("display","none");
$(".head").css("display","none");
$("#loading ,.dot-floating").height(h).css("display","block");
});

//全ての読み込みが完了したら実行
$(window).on("load",function () {
var now = new Date().getTime();
if (now-time<=2500) {
setTimeout("stopload()",5000-(now-time));
return;
} else {
stopload();
}
});
//10秒たったら強制的にロード画面を非表示
 window.addEventListener("DOMContentLoaded", function(){
setTimeout("stopload()",10000);
});

function stopload(){
$("#loading").delay(300).fadeOut(800);
$(".dot-floating").delay(200).fadeOut(600);
$(".wrap").css("display","block");
$(".head").css("display","block");
}
</script>

<!--DarkMode-->
<style type="text/css">@media(prefers-color-scheme:dark){
table.gsc-search-box td.gsc-input{background:transparent !important}td#gs_tti50{background:transparent !important;border-radius:25px 0 0 25px !important}table.gsc-search-box{border-radius:25px !important;background:transparent !important}.gsc-input{border-radius:25px !important}.gsc-input-box{background:var(--main-bg) !important;border:none !important}input:placeholder-shown{color:tomato !important}input#gsc-i-id1{background:transparent!important;color:var(--main-bg)!important}.gsst_a .gscb_a{color:darkgoldenrod}input#gsc-i-id1:focus{outline:none !important}
}
</style>
<!--normal-->
<style type="text/css">
section
{
  max-width: 275px;
  margin-right: auto;
  margin-left: auto;
  padding-top: 10px;
  padding-right: 30px;
  padding-bottom: 30px;
  padding-left: 30px;
  position: absolute;
  top: 100px;
  color: var(--main-bg);
  z-index: 299!important
}
section p{color:var(--main-text)!important}
 
/** 外枠に色を付けて角丸にする */
.gsc-control-cse
{
  margin: 0px !important;
  padding: 0px !important;
  border-radius: 30px;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
}
 
/** 外枠内側のマージンを0にする */
.gsc-search-box
{
  margin: 0px !important;
}
 
 
/** キーワード入力部分のボーダーを消し、角丸にする */
.gsc-input-box 
{
    border: none !important;
  border-radius: 30px !important;
  -webkit-border-radius: 30px !important;
  -moz-border-radius: 30px !important;
}
 
 
/** キーワード入力部分の左側に20ピクセル余白を入れる */
.gsib_a
{
  padding-left: 20px !important;
}
 
 
 
/** 検索ボタンを無色透明にし、線を消す */
.gsc-search-button-v2
{
  margin: 0px !important;
  padding-top: 12px !important;
  padding-bottom: 13px !important;
  padding-right: 14px !important;
  padding-left: 14px !important;
  background-color: transparent !important;
  color: #4990c8 !important;
  border-top-style: none !important;
  border-right-style: none !important;
  border-bottom-style: none !important;
  border-left-style: none !important;
  cursor:pointer;
}
 
/** 検索ボタンのアイコンの色と大きさを設定 */
.gsc-search-button-v2 svg 
{
    fill: #00a0e9!important;
    width: 20px;
    height: 20px;
}
 
/** placeholderの色設定 */
input:placeholder-shown {    color: #bababa; }
 
/* Google Chrome, Safari, Opera 15+, Android, iOS */
input::-webkit-input-placeholder {    color: #bababa; }
 
/* Firefox 18- */
input:-moz-placeholder {    color: #bababa; opacity: 1; }
 
/* Firefox 19+ */
input::-moz-placeholder {   color: #bababa; opacity: 1; }
 
/* IE 10+ */
input:-ms-input-placeholder {   color: #bababa !important; }
div#___gcse_0 {
  border: 2px solid #00a0e9 !important;
  border-radius: 25px!important;
}
table.gsc-search-box td {
  vertical-align: middle;
  font-size: 21px!important
}

@media screen and (min-width:768px) {
section {
  left:120px!important;
}
}

@media screen and (min-width:900px) {
section {
  max-width: 235px!important;
  left: 190px!important;
  top: -34px!important;
  transform: scale(0.85)!important;
  z-index: 300!important;
  position: fixed!important;
}
}

@media screen and (min-width:960px) {
section {
  max-width: 210x!important;
  top: -19px!important;
  }
  section p{color:var(--main-text)!important}
}

@media screen and (min-width:1024px){

section {
  max-width: 200px!important;
  top: -19px!important;
  left: 235px!important;
}

}  

@media screen and (min-width:1100px) and (max-width:1280px) {

section {
  max-width: 265px!important;
  top: -19px!important;
  left: 370px!important;
}

} 

@media screen and (min-width:1300px) {

section {
  max-width: 265px!important;
  top: -19px!important;
  left: 445px!important;
}

} 

</style>
 
<script>
window.onload = function(){	$("section input").attr("placeholder", "サイト内検索");};
</script>
<section>
<p>検索窓</p>
<script async src="https://cse.google.com/cse.js?cx=9b3f712378ff4f2ab"></script>
<div class="gcse-searchbox-only"></div>
</section>

<script async src="https://cse.google.com/cse.js?cx=9b3f712378ff4f2ab">
</script>
<div class="gcse-searchresults-only"></div>';
