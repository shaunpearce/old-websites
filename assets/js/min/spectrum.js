jQuery(document).ready(function () {
  var t = {
    Android: function () {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
      return navigator.userAgent.match(/iPhone|iPod/i);
    },
    Opera: function () {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
      return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
      return (
        t.Android() || t.BlackBerry() || t.iOS() || t.Opera() || t.Windows()
      );
    },
  };
  t.any() &&
    $(".navbar-collapse a").click(function (t) {
      $(".navbar-collapse").collapse("toggle");
    }),
    $(".page-scroll a").bind("click", function (t) {
      var n = $(this);
      $("html, body")
        .stop()
        .animate(
          { scrollTop: $(n.attr("href")).offset().top },
          1500,
          "easeInOutExpo"
        ),
        t.preventDefault();
    });
}),
  $(window).scroll(function () {
    $(".navbar").offset().top > 50 && $(window).width() > 480
      ? ($(".navbar-fixed-top").addClass("top-nav-collapse"),
        $(".logoimg").attr("src", "assets/img/shaunpearcelogo.png"))
      : ($(".navbar-fixed-top").removeClass("top-nav-collapse"),
        $(".logoimg").attr("src", "assets/img/shaunpearcelogo2.png"));
  }),
  jQuery(document).ready(function () {
    var t = {
      Android: function () {
        return navigator.userAgent.match(/Android/i);
      },
      BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
      },
      iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
      },
      Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
      },
      Windows: function () {
        return navigator.userAgent.match(/IEMobile/i);
      },
      any: function () {
        return (
          t.Android() || t.BlackBerry() || t.iOS() || t.Opera() || t.Windows()
        );
      },
    };
    t.any() ||
      $(window).stellar({
        horizontalScrolling: !1,
        verticalOffset: 550,
        horizontalOffset: 0,
        hideDistantElements: !1,
      }),
      $('#contactForm input[type="text"]').attr(
        "style",
        "-webkit-box-shadow: inset 0 0 0 1000px #F4F5F7 !important; -webkit-text-fill-color: #6B7686 !important;"
      ),
      $('#contactForm input[type="email"]').attr(
        "style",
        "-webkit-box-shadow: inset 0 0 0 1000px #F4F5F7 !important; -webkit-text-fill-color: #6B7686 !important;"
      ),
      $(".demo").progressBar({
        height: "30",
        backgroundColor: "#E0E0E0",
        barColor: "#202734",
        targetBarColor: "white",
        percentage: !1,
        shadow: !1,
        border: !1,
        animation: !0,
        animateTarget: !0,
      }),
      $(".container").fitVids(),
      $(".gallery-item").magnificPopup({
        type: "image",
        gallery: { enabled: !0 },
      }),
      $("body")
        .on("input propertychange", ".floating-label-form-group", function (t) {
          $(this).toggleClass(
            "floating-label-form-group-with-value",
            !!$(t.target).val()
          );
        })
        .on("focus", ".floating-label-form-group", function () {
          $(this).addClass("floating-label-form-group-with-focus");
        })
        .on("blur", ".floating-label-form-group", function () {
          $(this).removeClass("floating-label-form-group-with-focus");
        });
  }),
  $(window).load(function () {
    $(function () {
      $(".element").typed({
        strings: [
          "I am passionate about designing...",
          " and developing aesthetic software.",
          "I am a skilled Software Engineer...",
          "with a creative flair",
          "nice to meet you",
        ],
        typeSpeed: 25,
        backSpeed: 0,
        startDelay: 1e3,
      });
    });
  });
