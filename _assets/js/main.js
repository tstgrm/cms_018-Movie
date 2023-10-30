$(window).on("load", function () {
  /*----------------------------------------
		modal
	----------------------------------------*/
  // モーダルメニュー
  $(".js-modal-menu-toggle").on("click tap", function () {
    var status = $("body").attr("data-modal-menu");

    // メニューが表示されてたら
    if (status == "active") {
      $("body").attr("data-modal-menu", "");
      $("body").attr("data-bodyfixed", "false").css({ top: 0 });
      window.scrollTo(0, scrollpos);

      setTimeout(function () {
        $(".js-modal-menu-item").removeClass("is-animated");
        $(".js-modal-menu-toggle").removeClass("is-animated");
      }, 200);
    } else {
      scrollpos = $(window).scrollTop();
      $("body").attr("data-modal-menu", "active");
			$("body").attr("data-bodyfixed", "true").css({ top: -scrollpos });

      // $(".js-modal-menu-item").each(function (k) {
      //   var $this = $(this);
      //   setTimeout(function () {
      //     setTimeout(function () {
      //       $this.addClass("is-animated");
      //     }, 90 * k++);

      //     $(".js-modal-menu-toggle").addClass("is-animated");
      //   }, 300);
      // });
    }
  });

  // modal toggle button
  // $(".js-modal-toggle").on("click tap", function () {
  //   var status = $("body").attr("data-modal"); // 表示・非表示の判定用
  //   var modalType = $(this).attr("data-modal"); // モーダルのタイプを取得
  //   $(".js-modal-target").removeClass("is-active"); // ターゲットを初期化

  //   // モーダル非表示時
  //   if (status == "active") {
  //     closeModal();
  //     $("body").attr("data-modal", "false");

  //     // モーダル表示時
  //   } else {
  //     // スクロール位置を固定
  //     scrollpos = $(window).scrollTop();
  //     $("body").attr("data-bodyfixed", "true").css({ top: -scrollpos });

  //     // toggleに設定されていたモーダルタイプに設定
  //     $("body").attr("data-modal", "active");
  //     $("body").attr("data-modal-type", modalType);

  //     // モーダルタイプとモーダルIDが同じものがあれば、それを表示
  //     $(".js-modal-target").each(function () {
  //       if (modalType === $(this).attr("data-modal-id")) {
  //         $(this).addClass("is-active");
  //       }
  //     });
  //   }
  // });

  // modal 枠外をクリックで閉じる
  // $(".js-modal").on("click", function (e) {
  //   if (e.target.closest(".js-modal-content") === null) {
  //     closeModal();
  //   }
  // });

  // function closeModal() {
  //   // スクロール位置を戻す
  //   $("body").attr("data-modal", "");
  //   $("body").attr("data-bodyfixed", "false").css({ top: 0 });
  //   window.scrollTo(0, scrollpos);

  //   // youtube埋め込み動画を停止させる
  //   if ($(".js-video-ctrl iframe").length) {
  //     // youtube埋め込みを外部から制御可能にする
  //     var src = $(".js-video-ctrl iframe").attr("src");
  //     src += "?enablejsapi=1";
  //     $(".js-video-ctrl iframe").attr("src", src);

  //     videoControl("stopVideo");
  //     function videoControl(action) {
  //       var iframe = $(".js-video-ctrl iframe")[0].contentWindow;
  //       iframe.postMessage(
  //         '{"event":"command","func":"' + action + '","args":""}',
  //         "*"
  //       );
  //     }
  //   }
  // }

  /*----------------------------------------
		slider
	----------------------------------------*/
  //TOP > MAINVISUAL

  // TOP CASE
	if (window.matchMedia("(max-width: 767px)").matches) {
		if ($(".js-top-case-slider .swiper-slide").length > 1) {
			var topCaseSwiper = new Swiper(".js-top-case-slider .swiper", {
				loop: true,
				speed: 500,
				effect: "slide", //slide,fade,cube,coverflow,flip
				// autoplay: {
				//   delay: 4500,
				//   disableOnInteraction: false, //スワイプされたら自動再生停止するか
				// },
				navigation: {
					nextEl: ".js-top-case-slider .swiper-button-next",
					prevEl: ".js-top-case-slider .swiper-button-prev",
				},
				slidesPerView: 1,
				// centeredSlides: true,
				loopAdditionalSlides: 1, //クローンの数
				spaceBetween: 20,
				// breakpoints: {
				//   // スライドの表示枚数：500px以上の場合
				//   768: {
				//     slidesPerView: 0.85,
				//   },
				// },
			});
		}
	} else if (topCaseSwiper) {
		topCaseSwiper.destroy(false, true);
	}

  // CASE > pickup
  if ($(".js-pickup-slider .swiper-slide").length > 1) {
    var topAboutSwiper = new Swiper(".js-pickup-slider .swiper", {
      loop: true,
      speed: 500,
      effect: "slide", //slide,fade,cube,coverflow,flip
      // autoplay: {
      //   delay: 4500,
      //   disableOnInteraction: false, //スワイプされたら自動再生停止するか
      // },
      pagination: {
        el: ".js-pickup-slider .swiper-pagination",
        type: "bullets", // 'bullets','fraction','progressbar'
        clickable: true, // クリックによるスライド切り替えを有効にする
      },
      navigation: {
        nextEl: ".js-pickup-slider .swiper-button-next",
        prevEl: ".js-pickup-slider .swiper-button-prev",
      },
      slidesPerView: 1,
      centeredSlides: true,
      loopAdditionalSlides: 1, //クローンの数
      spaceBetween: 0,
      // breakpoints: {
      //   // スライドの表示枚数：500px以上の場合
      //   768: {
      //     slidesPerView: 0.85,
      //   },
      // },
    });
  }

  /*----------------------------------------
		load contnet
	----------------------------------------*/
  // setTimeout(function () {
  //   $("body").attr("data-status", "loaded");
    // textSplit();
    // eachAnimate();
    // eachAnimateQueue();
  // }, 300);

  setTimeout(function () {
    if (!$("#js-loader").hasClass("is-loaded")) {
      $("#js-loader").addClass("is-loaded");
      $("body").attr("data-status", "loaded");
      $(window).on("load scroll", function () {
        // textSplit();
        // eachAnimate();
        // eachAnimateQueue();
      });
    }
  }, 5000);

  // $(window).on("scroll", function () {
  //   eachAnimate();
  //   eachAnimateQueue();
  // });

  /*----------------------------------------
		accordion
	----------------------------------------*/
  // accordion
  $(".js-accordion-btn").on("click tap", function () {
    $(this).next(".js-accordion-target").slideToggle(300);
    $(this).parent(".js-accordion-item").toggleClass("is-active");
  });

  // accordion sp only
  // if (window.matchMedia("(max-width: 767px)").matches) {
  //   $(".js-accordion-btn-sp").on("click tap", function () {
  //     $(this).next(".js-accordion-target-sp").slideToggle(300);
  //     $(this).parent(".js-accordion-item-sp").toggleClass("is-active");
  //   });
  // }

  /*----------------------------------------
		form
	----------------------------------------*/
  // form checkbox チェックされてたらラベルにクラスを付与
  // $(".js-checkbox").change(function () {
  //   if ($(this).prop("checked")) {
  //     $(this).parent(".js-checkbox-label").addClass("is-active");
  //   } else {
  //     $(this).parent(".js-checkbox-label").removeClass("is-active");
  //   }
  // });
  // $(".js-checkbox").each(function () {
  //   if ($(this).prop("checked")) {
  //     $(this).parent(".js-checkbox-label").addClass("is-active");
  //   } else {
  //     $(this).parent(".js-checkbox-label").removeClass("is-active");
  //   }
  // });

	/*----------------------------------------
		etc
	----------------------------------------*/
  // ページ一番上から下にスクロールしたとき、ヘッダーにクラス付与
  $(function () {
    var pos = 0;
    var element = $(".js-header");
    var status = $("body").attr("data-modal-menu", "");

    $(window).on("scroll", function () {
      if ($(this).scrollTop() > pos) {
        //ページ一番上から下にスクロールしたとき
        element.addClass("is-scroll");
      } else if (status !== "active") {
        element.removeClass("is-scroll");
      }
    });
  });

  // patetop　上へスクロール
  // $(".js-pagetop").on("click tap", function () {
  //   $("body,html").animate({ scrollTop: 0 }, 800, "swing");
  // });

  // youtube_defer(); // 埋め込み動画の遅延読み込み
});

/*----------------------------------------
	遅延読み込み
----------------------------------------*/
// 埋め込み動画の遅延読み込み
// function youtube_defer() {
//   var iframes = $("iframe");
//   iframes.each(function () {
//     // console.log($(this).attr("data-src"));
//     if (!$(this).attr("loading")) {
//       $(this).attr("loading", "lazy");
//     }
//     if ($(this).attr("data-src")) {
//       $(this).attr("src", $(this).attr("data-src"));
//     }
//   });
// }


//アニメーション発火
// function eachAnimate() {
//   $(".js-animate").each(function () {
//     var objPos = $(this).offset().top; //対象の画面上部からの距離
//     var winH = $(window).height(); //ウィンドウの高さ
//     var offset = $(this).data("offset") ? $(this).data("offset") : 250;
//     var scroll = $(window).scrollTop() + offset; //スクロールの量
//     if (scroll > objPos - winH / 1.4) {
//       $(this).addClass("is-animated");
//       // $(this).removeClass("js-animate");
//     }
//     if ($(this).is("[data-delay]")) {
//       // delayの設定があれば反映
//       delay = $(this).attr("data-delay");
//       $(this).css("transition-delay", delay);
//     }
//   });
// }

// 要素を順番にアニメーション
// function eachAnimateQueue() {
//   $(".js-animate-queue").each(function () {
//     var objPos = $(this).offset().top; //対象の画面上部からの距離
//     var winH = $(window).height(); //ウィンドウの高さ
//     var offset = $(this).data("offset") ? $(this).data("offset") : 250;
//     var scroll = $(window).scrollTop() + offset; //スクロールの量

//     if (scroll > objPos - winH / 1.4) {
//       $(this)
//         .find(".js-animate-queue__item")
//         .each(function (index) {
//           // console.log($(this));
//           $(this)
//             .delay(index * 50)
//             .queue(function () {
//               $(this).addClass("is-animated");
//             });
//         });
//     }
//   });
// }

// 1文字ずつ表示する際に必要
// function textSplit() {
// 	$(".js-text-split").each(function () {
// 		// 1文字ずつ<span>で囲む
// 		$(this)
// 			.children()
// 			.addBack()
// 			.contents()
// 			.each(function () {
// 				if (this.nodeType == 3) {
// 					$(this).replaceWith(
// 						$(this).text().replace(/(\S)/g, "<span><span>$1</span></span>")
// 					);
// 				}
// 			});
// 		// スクロールして要素が画面内に入ったら文字を表示
// 		// 1文字ずつ順番に表示(不透明にする)
// 		var spans = $(this).find("> span > span");
// 		var start = parseFloat(
// 			spans.eq(0).css("transition-delay").replace("s", "")
// 		);
// 		var increment = $(this).attr("data-increment")
// 			? $(this).attr("data-increment")
// 			: 0.03;

// 		$(this)
// 			.find("span")
// 			.each(function (i) {
// 				$(this)
// 					.children("span")
// 					.css({
// 						transitionDelay: start + increment * i + "s",
// 					});
// 			});
// 	});
// }

/*----------------------------------------
	scroll-hint
----------------------------------------*/
if (window.matchMedia("(max-width: 767px)").matches) {
	new ScrollHint(".js-scrollable-sp", {
		remainingTime: 5000, // 一定時間が経ったらアイコンを非表示
		enableOverflowScrolling: true, // iOSの場合にスムーズなスクロールになるようにCSSのプロパティを追加
		// suggestiveShadow: true,
		// scrollHintIconAppendClass: "scroll-hint-icon-white", // ヒントを白色にする
		i18n: {
			scrollable: "スクロール可能",
		},
	});
}

//スムーススクロール ページ遷移
$(window).on("load", function () {
  //遷移してきたときにスクロール
  var urlHash = location.hash;
  urlHash = urlHash.replace(/\//g, "").replace(/\%/g, "\\%"); // 日本語リンク名のエラー回避
  // console.log(urlHash);
  var speed = 500;
  var offset = 0;

  if (urlHash) {
    var target = $(urlHash);

    if (target.length) {
      var position =
        target.offset().top - $(".g-header").outerHeight() - offset;
      $("body, html").animate({ scrollTop: position }, speed, "swing");
    }
  }

  //クリックしたときにスクロール
  $("a").on("click tap", function (e) {
    var ref = location.href;
    var url = $(this).attr("href");

    if (ref.indexOf(url.replace(/#.*$/, "")) != -1 && url.indexOf("#") != -1) {
      var speed = 500;
      var hash = $(this)[0].hash;
      hash = hash.replace(/\//g, "").replace(/\%/g, "\\%"); // 日本語リンク名のエラー回避
      var target = $(hash);

      if (target) {
        var position =
          target.offset().top - $(".g-header").outerHeight() - offset;
        $("body, html").animate({ scrollTop: position }, speed, "swing");
      }
      return false;
    }
  });
});
