jQuery(document).ready(function() {
    "use strict";
    var percent_number_step = $.animateNumber.numberStepFactories;
    $(window).on("load", function() {
        $(".loader-wrapper").fadeOut(300), $("#main-menu").fadeIn(300);
    });
    $("*").css("height", function() {
        return $(this).attr("data-height") + "px";
    }),
        $("*").css("color", function() {
            return $(this).data("color");
        }),
        $("*").css("opacity", function() {
            return $(this).data("opacity");
        }),
        $("*").css("background-color", function() {
            return $(this).data("bg-color");
        }),
        $(
            "#fullpage .section, #fullpage .section .slide, .slider-panel-wrapper .slides li, .full-carousel-wrapper .carousel-item, .page-header, .page-footer, .page-team, .myVideo"
        ).css("background-image", function() {
            return "url(" + $(this).data("image-src") + ")";
        }),
        $(".top-triangle").css("border-bottom-color", function() {
            return $(this).data("shape-color");
        }),
        $(".number").html(function(e, a) {
            return a.replace(/(\d)/g, '<span class="font-number">$1</span>');
        }),
        $(".block-title h1")
            .before('<div class="line-before"></div>')
            .after('<div class="line-after"></div>')
            .wrapInner("<span></span>"),
        $(window).on("load resize", function() {
            $(".block-title h1").each(function() {
                var e = $(this)
                    .children()
                    .width();
                $(this).width(e);
            });
        }),
        $(".fit-img").each(function() {
            var e = $(this),
                a = $("img", e),
                t = a.attr("src");
            e.css("backgroundImage", "url(" + t + ")"), a.remove();
        }),
        $(window).on("load resize", function() {
            var e = $(window).height();
            $(".group-wrapper").height() > e - 60
                ? $(".more-item-link").css({ position: "relative" })
                : $(".more-item-link").css({ position: "absolute" });
        });
    $(".nav-inner-wrap, .container-wrapper");
    $("").slimScroll({ position: "right" });
    var e = ".progress-bar-wrapper:in-viewport";
    function a() {
        $(".progress-bar").css("width", function() {
            return $(this).attr("data-percentage") + "%";
        }),
            $(".progress-title").css("opacity", "1");
    }
    $(".container-wrapper").on("scroll", function() {
        $(e).each(function() {
            a();
        });
    });
    var t = ".animate-fadeIn:in-viewport",
        n = ".animate-fadeInUp:in-viewport",
        i = ".animate-fadeInDown:in-viewport",
        o = ".animate-fadeInLeft:in-viewport",
        s = ".animate-fadeInRight:in-viewport";
    $(t).each(function() {
        $(t)
            .delay(300)
            .animate({ opacity: 1 }, 2e3, "easeOutExpo");
    }),
        $(n).each(function() {
            $(n)
                .delay(300)
                .animate({ top: "0", opacity: 1 }, 2e3, "easeOutExpo");
        }),
        $(i).each(function() {
            $(i)
                .delay(300)
                .animate({ top: "0", opacity: 1 }, 2e3, "easeOutExpo");
        }),
        $(o).each(function() {
            $(o)
                .delay(300)
                .animate({ left: "0", opacity: 1 }, 2e3, "easeOutExpo");
        }),
        $(s).each(function() {
            $(s)
                .delay(300)
                .animate({ left: "0", opacity: 1 }, 2e3, "easeOutExpo");
        }),
        $(".container-wrapper").on("scroll", function() {
            $(t).each(function() {
                $(t)
                    .delay(300)
                    .animate({ opacity: 1 }, 2e3, "easeOutExpo");
            }),
                $(n).each(function() {
                    $(n)
                        .delay(300)
                        .animate({ top: "0", opacity: 1 }, 2e3, "easeOutExpo");
                }),
                $(i).each(function() {
                    $(i)
                        .delay(300)
                        .animate({ top: "0", opacity: 1 }, 2e3, "easeOutExpo");
                }),
                $(o).each(function() {
                    $(o)
                        .delay(300)
                        .animate({ left: "0", opacity: 1 }, 2e3, "easeOutExpo");
                }),
                $(s).each(function() {
                    $(s)
                        .delay(300)
                        .animate({ left: "0", opacity: 1 }, 2e3, "easeOutExpo");
                });
        }),
        $(".ripple").on("click", function(e) {
            var a = e.pageX,
                t = e.pageY - $(this).offset().top,
                n = a - $(this).offset().left,
                i = parseInt(n, 10),
                o = parseInt(t, 10);
            $(this)
                .find("svg")
                .remove(),
                $(this).append(
                    '<svg><circle cx="' +
                        i +
                        '" cy="' +
                        o +
                        '" r="0"></circle></svg>'
                );
            var s = $(this).find("circle");
            s.animate(
                { r: $(this).outerWidth() },
                {
                    easing: "easeOutQuad",
                    duration: 400,
                    step: function(e) {
                        s.attr("r", e);
                    }
                }
            ),
                $("svg").fadeOut(1e3);
        }),
        $("#main-menu .nav-menu li:has(ul)").each(function() {
            $(this).append("<span></span>"), $(this).addClass("dropdown-menu");
        }),
        $(".dropdown-menu ul").hide(),
        $("#main-menu .nav-menu li span").on("click", function() {
            $(this)
                .prev("ul")
                .slideToggle(300);
        });
    var r = ["left", "right"];
    $("#main-menu").hasClass("right")
        ? ($(".nav-btn").attr("data-side", "right"),
          $(".sidebar-nav").addClass("right"))
        : ($(".nav-btn").attr("data-side", "left"),
          $(".sidebar-nav").addClass("left"));
    $(".nav-btn[data-action]").on("click", function() {
        var e = $(this),
            a = e.attr("data-action"),
            t = e.attr("data-side");
        return (
            $(".sidebar-nav." + t).trigger("sidebar:" + a),
            $(".logo-wrap").toggleClass("d-none"),
            $(".social-wrap").toggleClass("d-none"),
            !1
        );
    }),
        $(".nav-menu li a").on("click", function() {
            $(".sidebar-nav").trigger("sidebar:close"),
                $(".dropdown-menu ul").hide(300);
        }),
        (navigator.userAgent.match(/iPhone/i) ||
            navigator.userAgent.match(/iPad/i) ||
            navigator.userAgent.match(/iPod/i)) &&
            $("#main-menu .nav-menu").css({ "margin-bottom": "100px" });
    var c = $(".services-panel3 .full-carousel-wrapper");
    c.owlCarousel({
        dots: !1,
        responsiveClass: !0,
        responsive: {
            0: { items: 1 },
            720: { items: 2 },
            768: { items: 2 },
            960: { items: 3 },
            1024: { items: 3 }
        }
    });
    var u = $(".content-block2 .full-carousel-wrapper");
    u.owlCarousel({
        dots: !1,
        responsiveClass: !0,
        responsive: {
            0: { items: 1 },
            720: { items: 2 },
            768: { items: 2 },
            960: { items: 3 },
            1200: { items: 4 }
        }
    });
    var d = $(".portfolio-panel2 .full-carousel-wrapper");
    d.owlCarousel({
        dots: !1,
        responsiveClass: !0,
        responsive: {
            0: { items: 1 },
            720: { items: 2 },
            768: { items: 2 },
            960: { items: 3 },
            1200: { items: 4 }
        }
    });
    var m = $(".related-work .owl-carousel");
    m.owlCarousel({
        dots: !1,
        responsiveClass: !0,
        responsive: {
            0: { items: 1 },
            480: { items: 2 },
            768: { items: 3 },
            960: { items: 4 },
            1200: { items: 5 }
        }
    }),
        $(".btn.next").on("click", function() {
            c.trigger("next.owl.carousel", [500]),
                u.trigger("next.owl.carousel", [500]),
                d.trigger("next.owl.carousel", [500]),
                m.trigger("next.owl.carousel", [500]);
        }),
        $(".btn.prev").on("click", function() {
            c.trigger("prev.owl.carousel", [500]),
                u.trigger("prev.owl.carousel", [500]),
                d.trigger("prev.owl.carousel", [500]),
                m.trigger("prev.owl.carousel", [500]);
        }),
        $(window).on("load resize", function() {
            var e = $(".carousel-inner.title"),
                a = $(".carousel-block-title").height(),
                t = $(".carousel-inner.item"),
                n = t.height();
            e.each(function() {
                $(this).css("margin-top", -a / 2);
            }),
                t.each(function() {
                    $(this).css("margin-top", -n / 2);
                });
        }),
        $(".content-block1 .box-carousel-wrapper").owlCarousel({
            dots: !0,
            responsiveClass: !0,
            responsive: {
                0: { items: 1 },
                720: { items: 2 },
                768: { items: 2 },
                960: { items: 3 },
                1024: { items: 4 }
            }
        }),
        $(".home-blog-panel .box-carousel-wrapper").owlCarousel({
            dots: !0,
            responsiveClass: !0,
            loop: !0,
            autoplay: !0,
            autoplayTimeout: 1e3,
            autoplayHoverPause: !0,
            responsive: {
                0: { items: 1 },
                720: { items: 2 },
                768: { items: 2 },
                960: { items: 4 },
                1024: { items: 4 }
            }
        }),
        $(
            ".home-team-panel .box-carousel-wrapper, .page-team .box-carousel-wrapper"
        ).owlCarousel({
            dots: !0,
            responsiveClass: !0,
            responsive: {
                0: { items: 1 },
                720: { items: 2 },
                768: { items: 2 },
                960: { items: 3 },
                1024: { items: 3 }
            }
        }),
        $(window).on("load", function() {
            $(".flexslider.slider-panel-wrapper").flexslider({
                controlNav: !1,
                directionNav: !1,
                slideshow: !0,
                animationSpeed: 800,
                multipleKeyboard: !0,
                pauseOnHover: !0
            }),
                $(".featured-area .flexslider").flexslider({
                    controlNav: !1,
                    directionNav: !1,
                    slideshow: !0,
                    animationSpeed: 800,
                    multipleKeyboard: !0,
                    pauseOnHover: !0
                }),
                $(".section .slide-prev.prev, .section .slide-next.next").on(
                    "click",
                    function() {
                        $(".section").removeClass("addcustomNav"),
                            $(this)
                                .parents(".section")
                                .addClass("addcustomNav");
                        var e = $(this).attr("href");
                        return $(".addcustomNav .flexslider").flexslider(e), !1;
                    }
                ),
                $(
                    ".page-header-featured .slide-prev.prev, .page-header-featured .slide-next.next"
                ).on("click", function() {
                    var e = $(this).attr("href");
                    return (
                        $(".page-header-featured .flexslider").flexslider(e), !1
                    );
                });
        }),
        $(window).on("load resize", function() {
            var e = $(window).height();
            $(".slider-panel-wrapper .slides li").height(e);
        }),
        $(".nav-open").midnight();
    var f = $("#fullpage");
    f.hasClass("fullpageDisable") || f.addClass("normalScroll"),
        $(".nav-menu li").click(function(e) {
            $(".logo-wrap").removeClass("d-none"),
                $(".social-wrap").addClass("d-none");
        }),
        f.hasClass("fullpageDisable")
            ? $(".overlay").hide()
            : $("#fullpage").fullpage({
                  autoScrolling: !1,
                  scrollOverflow: !1,
                  resize: !1,
                  anchors: [
                      "panelBlock1",
                      "panelBlock2",
                      "panelBlock3",
                      "panelBlock4"
                  ],
                  menu: ".nav-menu",
                  navigation: !0,
                  navigationPosition: "right",
                  slidesNavigation: !0,
                  loopHorizontal: !0,
                  afterLoad: function(t, n) {
                      2 == n &&
                          ($(".panel-2 .animate-fadeIn").animate(
                              { opacity: 1 },
                              1500,
                              "easeOutExpo"
                          ),
                          $(
                              ".panel-2 .animate-fadeInUp, .panel-2 .animate-fadeInDown"
                          ).animate(
                              { top: "0", opacity: 1 },
                              1500,
                              "easeOutExpo"
                          ),
                          $(
                              ".panel-2 .animate-fadeInLeft, .panel-2 .animate-fadeInRight"
                          ).animate(
                              { left: "0", opacity: 1 },
                              1500,
                              "easeOutExpo"
                          ),
                          $(e).each(function() {
                              a();
                          })),
                          3 == n &&
                              ($(".panel-3 .animate-fadeIn").animate(
                                  { opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(
                                  ".panel-3 .animate-fadeInUp, .panel-3 .animate-fadeInDown"
                              ).animate(
                                  { top: "0", opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(
                                  ".panel-3 .animate-fadeInLeft, .panel-3 .animate-fadeInRight"
                              ).animate(
                                  { left: "0", opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(e).each(function() {
                                  a();
                              })),
                          4 == n &&
                              ($(".panel-4 .animate-fadeIn").animate(
                                  { opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(
                                  ".panel-4 .animate-fadeInUp, .panel-4 .animate-fadeInDown"
                              ).animate(
                                  { top: "0", opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(
                                  ".panel-4 .animate-fadeInLeft, .panel-4 .animate-fadeInRight"
                              ).animate(
                                  { left: "0", opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),

                              $('.stat-value').each(function(){
                                  $(this).animateNumber(
                                    {
                                      number: $(this).data("number"),
                                      color: 'green',
                                      'font-size': '30px',
                                      numberStep: percent_number_step.append('')
                                    },
                                    {
                                      easing: 'swing',
                                      duration: 5000
                                    }
                                  )
                              }),
                              $(e).each(function() {
                                  a();
                              })),
                          7 == n &&
                              ($(".panel-7 .animate-fadeIn").animate(
                                  { opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(
                                  ".panel-7 .animate-fadeInUp, .panel-7 .animate-fadeInDown"
                              ).animate(
                                  { top: "0", opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(
                                  ".panel-7 .animate-fadeInLeft, .panel-7 .animate-fadeInRight"
                              ).animate(
                                  { left: "0", opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(e).each(function() {
                                  a();
                              })),
                          8 == n &&
                              ($(".panel-8 .animate-fadeIn").animate(
                                  { opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(
                                  ".panel-8 .animate-fadeInUp, .panel-8 .animate-fadeInDown"
                              ).animate(
                                  { top: "0", opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(
                                  ".panel-8 .animate-fadeInLeft, .panel-8 .animate-fadeInRight"
                              ).animate(
                                  { left: "0", opacity: 1 },
                                  1500,
                                  "easeOutExpo"
                              ),
                              $(e).each(function() {
                                  a();
                              }));
                  }
              }),
        $("#moveSectionDown").on("click", function(e) {
            e.preventDefault(), $.fn.fullpage.moveSectionDown();
        }),
        $(window).on("load resize", function() {
            var e = $("#fullpage");
            e.hasClass("normalScroll")
                ? (e.addClass("addNormalScroll"),
                  e.removeClass("addAutoScroll"))
                : e.hasClass("fullpageDisable") ||
                  (e.addClass("addAutoScroll"),
                  e.removeClass("addNormalScroll"));
        }),
        $(window).on("load", function() {
            setTimeout(function() {
                var e = $("#fullpage"),
                    a = window.location.hash.replace("#", "").split("/")[0],
                    t = $('[data-anchor="' + a + '"]');
                e.hasClass("addAutoScroll") && $.fn.fullpage.reBuild(),
                    e.hasClass("addNormalScroll") &&
                        $("html, body").scrollTop(t.position() ? t.position().top:0);
            }, 1e3);
        }),
        $(window).on("load resize", function() {
            var e = $(".portfolio-panel3 .portfolio-detail-wrapper"),
                a = $(".portfolio-tabs").height();
            e.height(a);
        }),
        $("#submit_message").on("click", function() {
            $("#reply_message").removeClass(), $("#reply_message").html("");
            $("input#email")
                .parent()
                .siblings(".validation-error")
                .html(""),
                $("textarea#mymessage")
                    .parent()
                    .siblings(".validation-error")
                    .html(""),
                $("input#name")
                    .parent()
                    .siblings(".validation-error")
                    .html("");
            var e = $("input#name").val();
            if ("" == e || "Name" == e)
                return (
                    $("input#name").val(""),
                    $("input#name")
                        .parent()
                        .siblings(".validation-error")
                        .html("you have to specify a name"),
                    $("input#name").focus(),
                    !1
                );
            var a = $("input#email").val();
            if (
                "" != a &&
                !/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(a)
            )
                return (
                    $("input#email")
                        .parent()
                        .siblings(".validation-error")
                        .html("Your email is incorrect"),
                    $("input#email").val(""),
                    $("input#email").focus(),
                    !1
                );
            var t = $("textarea#mymessage").val();
            if ("" == t || "Mymessage" == t || t.length < 2)
                return (
                    $("textarea#mymessage").val(""),
                    $("textarea#mymessage")
                        .parent()
                        .siblings(".validation-error")
                        .html("You have to specify a message"),
                    $("textarea#mymessage").focus(),
                    !1
                );
            var n =
                "name=" +
                $("input#name").val() +
                "&email=" +
                $("input#email").val() +
                "&message=" +
                $("textarea#mymessage").val() +
                "&_token=" +
                $("[name=csrf-token]").attr("content");
            $(".loading").fadeIn(500);
            var i = $(this);
            return (
                $.ajax({
                    type: "POST",
                    url: i.closest("form").attr("action"),
                    data: n,
                    dataType: "json",
                    success: function(e) {
                        console.log(e),
                            $(".loading").hide(),
                            i
                                .closest("form")
                                .find(".submit-message")
                                .html(e.message),
                            setTimeout(function() {
                                i.closest("form")
                                    .find(".submit-message")
                                    .html("");
                            }, 5e3),
                            i.closest("form")[0].reset();
                    }
                }),
                !1
            );
        });
});
