$(".effect").on("inview", function () {
  var a = $(this);
  a.addClass("start")
});
var $header = $("header");
var w_h = $(window).height();
var topBtn = $(".to_top");
if ((navigator.userAgent.indexOf("iPhone") > 0 && navigator.userAgent.indexOf("iPad") == -1 || navigator.userAgent.indexOf("macintosh") > -1 && "ontouchend" in document) || navigator.userAgent.indexOf("iPod") > 0 || navigator.userAgent.indexOf("Android") > 0) {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 240 && menuOpen == false) {
      topBtn.fadeIn()
    } else {
      topBtn.fadeOut()
    }
  })
} else {
  $(window).scroll(function () {
    var d = $(window).height();
    var a = $(this).scrollTop();
    var b = d / 2;
    var c = b + a / 2;
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
    var a = 500;
    var d = $(this).attr("href");
    var b = $(d == "#" || d == "" ? "html" : d);
    var c = b.offset().top;
    $("html, body").animate({
      scrollTop: c
    }, a, "swing");
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
$(window).fadeThis();