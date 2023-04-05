<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'firefox') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'Windows Phone') !== false)) { ?><?php } elseif ((strpos($ua, 'iPad') !== false) ||(strpos($ua, 'iPhone') !== false) ||(strpos($ua, 'iPod') !== false) || (strpos($ua, 'MacIntel') !== false) && navigator.maxTouchPoints > 1) {?><?php } elseif (strpos($ua, 'Android') !== false) { ?><?php } else { ?><link rel="preload" href="../js/x_jquery.nicescroll.min.js" crossorigin="" referrerpolicy="no-referrer" as="script"><script src="../js/x_jquery.nicescroll.min.js" crossorigin="" referrerpolicy="no-referrer"></script><style>div[id^='ascrail']{-webkit-overflow-y:hidden;-moz-overflow-y:hidden;overflow-y:hidden;z-index:201;-moz-border-radius:100vh;-webkit-border-radius:100vh;border-radius:100vh;display:block;background:rgb(221,221,221);width:100%;overflow-x:hidden;-moz-overflow-x:hidden;-webkit-overflow-x:hidden;width:inherit;opacity:0;-webkit-transition:1.0s;-moz-transition:1.0s;transition:1.0s}.nicescroll-cursors{positon:relative!important;max-height:7em}</style>
<script>
$(document).ready(function(){
    $("body").niceScroll({cursorborder:"1px solid rgba(9, 164, 241, 0.7)",cursorcolor:"#7fb1ea",cursorwidth:"12px",cursoropacitymax:"0.7",cursoropacitymin:"0.4",cursorborderradius:"100vh",scrollspeed: 50,mousescrollstep:30,zindex:"201",background:"#ea9b7f61",disablemutationobserver:true,oneaxismousemode:"auto",autohidemode:true,hidecursordelay:400,horizrailenabled:false,cursorfixedheight:false,cursorminheight:20,enablekeyboard:true,bouncescroll:false,smoothscroll:true,iframeautoresize:true,touchbehavior:false,enableobserver:true});  
    });
    setTimeout(function(){
      $("body").getNiceScroll().resize()
    }, 500);
setTimeout(function(){

$("#div-to-scroll").scroll(function(){
  $("#div-to-scroll").getNiceScroll().resize();
});
    }, 500);
</script>
<?php } ?>