<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'firefox') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'Windows Phone') !== false)) { ?><?php } elseif ((strpos($ua, 'iPad') !== false) ||(strpos($ua, 'iPhone') !== false) ||(strpos($ua, 'iPod') !== false) || (strpos($ua, 'MacIntel') !== false) && navigator.maxTouchPoints > 1) {?><?php } elseif (strpos($ua, 'Android') !== false) { ?><?php } else { ?><link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js" integrity="sha512-zMfrMAZYAlNClPKjN+JMuslK/B6sPM09BGvrWlW+cymmPmsUT1xJF3P4kxI3lOh9zypakSgWaTpY6vDJY/3Dig==" crossorigin="anonymous" referrerpolicy="no-referrer" as="script"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js" integrity="sha512-zMfrMAZYAlNClPKjN+JMuslK/B6sPM09BGvrWlW+cymmPmsUT1xJF3P4kxI3lOh9zypakSgWaTpY6vDJY/3Dig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><style>.nicescroll-cursors{positon:relative!important}div[id^='ascrail']{-webkit-overflow-y:hidden;-moz-overflow-y:hidden;overflow-y:hidden;z-index:1!important;-moz-border-radius:100vh;-webkit-border-radius:100vh;border-radius:100vh;display:block;background:rgb(221,221,221);width:100%;width:inherit!important;opacity:0}</style>

<script>
function handleTouchMove(event) {
    event.preventDefault();
}
//スクロール禁止
document.addEventListener('touchmove', handleTouchMove, { passive: false });
//スクロール復帰
document.removeEventListener('touchmove', handleTouchMove, { passive: false });
</script>

<script>
$(document).ready(function(){
    $("body").niceScroll({cursorcolor:"mediumaquamarine",cursorwidth:"12px",cursoropacitymax:"0.7",cursoropacitymin:"0.4",cursorborderradius:"100vh",cursorminheight:30,mousescrollstep:20,disablemutationobserver:true});
    });
    $("body").getNiceScroll().resize();
    $(function() {  
    $("#vary").click(function(){
        $("#hsize").getNiceScroll().resize();
    });
});
    </script>


<?php } ?>