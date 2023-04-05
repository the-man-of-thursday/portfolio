$(".effect").on("inview", function () {
  var a = $(this);
  a.addClass("start")
});
var $header = $("header");
var w_h = $(window).height();
var topBtn = $(".to_top");
if ((navigator.userAgent.indexOf("iPhone") > 0 && navigator.userAgent.indexOf("iPad") == -1 || navigator.userAgent.indexOf("macintosh") > -1 && "ontouchend" in document) || navigator.userAgent.indexOf("iPod") > 0 || navigator.userAgent.indexOf("Android") > 0) {
  $.sublime_slideshow({
    src: [{
      url: "img/slide/main_img_01_sp.jpg.webp"
    }, {
      url: "img/slide/main_img_02_sp.jpg.webp"
    }, {
      url: "img/slide/main_img_03_sp.jpg.webp"
    }, {
      url: "img/slide/main_img_04_sp.jpg.webp"
    }, {
      url: "img/slide/main_img_05_sp.jpg.webp"
    }],
    duration: 5,
    fade: 1,
    scaling: false,
    rotating: false,
  });
  $(window).scroll(function () {
    if ($(this).scrollTop() > 240 && menuOpen == false) {
      topBtn.fadeIn()
    } else {
      topBtn.fadeOut()
    }
  })
} else {
  $.sublime_slideshow({
    src: [{
      url: "img/slide/main_img_01.jpg"
    }, {
      url: "img/slide/main_img_02.jpg"
    }, {
      url: "img/slide/main_img_03.jpg"
    }, {
      url: "img/slide/main_img_04.jpg"
    }, {
      url: "img/slide/main_img_05.jpg"
    }],
    duration: 5,
    fade: 1,
    scaling: 1.07,
    rotating: false,
  });
  $(window).scroll(function () {
    var b = $(window).height();
    var c = $(this).scrollTop();
    var d = b / 2;
    var a = d + c / 2;
    if ($(this).scrollTop() > 240 && menuOpen == false) {
      topBtn.fadeIn()
    } else {
      topBtn.fadeOut()
    }
    if ($(window).scrollTop() > 300) {
      $header.addClass("fixed")
    } else {
      $header.removeClass("fixed")
    }
  })
}
$(function () {
  topBtn.hide();
  $('a[href^="#"]').click(function () {
    var c = 500;
    var b = $(this).attr("href");
    var d = $(b == "#" || b == "" ? "html" : b);
    var a = d.offset().top;
    $("html, body").animate({
      scrollTop: a
    }, c, "swing");
    return false
  })
});
$(function () {
  $(window).bind("scroll", function () {
    scrollHeight = $(document).height();
    scrollPosition = $(window).height() + $(window).scrollTop();
    footHeight = $("footer").height();
    if (scrollHeight - scrollPosition <= footHeight) {
      $(".to_top").css({
        position: "fixed",
        bottom: footHeight
      })
    } else {
      $(".to_top").css({
        position: "fixed",
        bottom: "10px"
      })
    }
  })
});
var bnrBtn = $("#g_navi");
var bnrBtn2 = $("#h_box_sp");
var menuOpen = false;
var scrollpos;
$(".bg_bl").hide();
var ttt = false;
$(function () {
  $(".menu_btn").on("click", function () {
    if (ttt == false) {
      bnrBtn.stop().animate({
        left: "20%"
      }, 300);
      bnrBtn2.stop().animate({
        left: "0%"
      }, 300);
      menuOpen = true;
      $(".om").hide();
      $(".to_top").hide();
      $(".bg_bl").fadeIn();
      scrollpos = $(window).scrollTop();
      $("body").addClass("fixed").css({
        top: -scrollpos
      });
      $(".menu_btn").addClass("opened");
      ttt = true
    } else {
      bnrBtn.stop().animate({
        left: "100%"
      }, 300);
      bnrBtn2.stop().animate({
        left: "100%"
      }, 300);
      menuOpen = false;
      $(".om").show();
      $(".bg_bl").fadeOut();
      $("body").removeClass("fixed").css({
        top: 0
      });
      $(".menu_btn").removeClass("opened");
      window.scrollTo(0, scrollpos);
      ttt = false
    }
  })
});
$(function () {
  $(".bg_bl").on("click", function () {
    bnrBtn.stop().animate({
      left: "100%"
    }, 300);
    bnrBtn2.stop().animate({
      left: "100%"
    }, 300);
    menuOpen = false;
    $(".om").show();
    $(".bg_bl").fadeOut();
    $("body").removeClass("fixed").css({
      top: 0
    });
    $(".menu_btn").removeClass("opened");
    window.scrollTo(0, scrollpos);
    ttt = false
  })
});

$(window).resize(function () {
  var b = $(window).width();
  var a = 960;
  if (b >= a) {
    bnrBtn.stop().animate({
      left: "100%"
    }, 300);
    bnrBtn2.stop().animate({
      left: "100%"
    }, 300);
    menuOpen = false;
    $(".bg_bl").hide();
    ttt = false;
    $(".menu_btn").removeClass("opened")
  }
});
$(function () {
  $(".ac_menu").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("active")
  })
});
$(function () {
  $("body").hide();
  $("body").fadeIn(300)
});
$(function () {
  $(window).fadeThis({
    speed: 2000
  })
});