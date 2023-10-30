// basic
const gulp = require("gulp");
const del = require("del");
const plumber = require("gulp-plumber"); // エラーが発生しても強制終了させない
const notify = require("gulp-notify"); // エラー発生時のアラート出力
const browserSync = require("browser-sync"); //ブラウザリロード

const rename = require("gulp-rename");	// ファイルのリネーム min.css, min.jsで使う

//scss
const sass = require("gulp-dart-sass"); //Dart Sass はSass公式が推奨 @use構文などが使える
const autoprefixer = require("gulp-autoprefixer"); //ベンダープレフィックス自動付与
const postcss = require("gulp-postcss"); //css-mqpackerを使うために必要
const mqpacker = require("css-mqpacker"); //メディアクエリをまとめる
// const gulpStylelint = require("gulp-stylelint");
// const mmq = require("gulp-merge-media-queries"); //メディアクエリをまとめる
const cssdeclsort = require("css-declaration-sorter"); //プロパティのソート
const cleanCSS = require("gulp-clean-css");	// minify

// js
const uglify = require("gulp-uglify");	//minify

//画像圧縮
const imagemin = require("gulp-imagemin");
const imageminMozjpeg = require("imagemin-mozjpeg");
const imageminPngquant = require("imagemin-pngquant");
const imageminSvgo = require("imagemin-svgo");

// 入出力するフォルダを指定
const srcBase = "../_static/src";
const assetsBase = "../_assets";
const distBase = "../_static/dist";

const srcPath = {
  scss: assetsBase + "/scss/**/*.scss",
  js: assetsBase + "/js/**/*.js",
  img: [assetsBase + "/img/**/*", "!" + assetsBase + "/img/svg/*.svg"],
  font: assetsBase + "/font/**/*",
  vendor: assetsBase + "/vendor/*",
  html: srcBase + "/**/*.html",
  // php: srcBase + '/**/*.php',
  php: "../*.php",
};

const distPath = {
  css: distBase + "/css/",
  js: distBase + "/js/",
  img: distBase + "/img/",
  font: distBase + "/font/",
  vendor: distBase + "/vendor/",
  html: distBase + "/",
  // php: distBase + '/',
};

/**
 * clean
 */
const clean = () => {
  return del([distBase + "/**"], {
    force: true,
  });
};

//ベンダープレフィックスを付与する条件
const TARGET_BROWSERS = [
  "last 2 versions",
  "ie >= 11",
  "iOS >= 7",
  "Android >= 4.4",
];

/**
 * sass
 *
 */
const cssSass = () => {
  return (
    gulp
      .src(srcPath.scss, {
        sourcemaps: true,
      })
      .pipe(
        //エラーが出ても処理を止めない
        plumber({
          errorHandler: notify.onError("Error:<%= error.message %>"),
        })
      )
      .pipe(
        sass({
          outputStyle: "expanded",
        })
      ) //指定できるキー expanded compressed

      .pipe(autoprefixer(TARGET_BROWSERS))
      // .pipe(postcss([mqpacker()])) // メディアクエリをまとめる
      .pipe(postcss([cssdeclsort({ order: "alphabetical" })]))
      // .pipe(mmq())
      // .pipe(
      //   gulpStylelint({
      //     fix: true,
      //   })
      // )
      .pipe(cleanCSS()) // minify
      .pipe(
        rename({
          extname: ".min.css",
        })
      )
      .pipe(
        gulp.dest(distPath.css, {
          sourcemaps: "./",
        })
      ) //コンパイル先
      .pipe(browserSync.stream())
      .pipe(
        notify({
          message: "Sassをコンパイルしました！",
          onLast: true,
        })
      )
  );
};

/**
 * 画像圧縮
 */
const imgImagemin = () => {
  return gulp
    .src(srcPath.img)
    .pipe(
      imagemin(
        [
          imageminMozjpeg({
            quality: 80,
          }),
          imageminPngquant(),
          imageminSvgo({
            plugins: [
              {
                removeViewbox: false,
              },
            ],
          }),
        ],
        {
          verbose: true,
        }
      )
    )
    .pipe(gulp.dest(distPath.img));
};

/**
 * html
 */
const html = () => {
  return gulp.src(srcPath.html).pipe(gulp.dest(distPath.html));
};

/**
 * js
 */
const js = () => {
  return gulp
    .src(srcPath.js)
    .pipe(
      //エラーが出ても処理を止めない
      plumber({
        errorHandler: notify.onError("Error:<%= error.message %>"),
      })
    )
    .pipe(uglify())
    .pipe(
      rename({
        extname: ".min.js",
      })
    )
    .pipe(gulp.dest(distPath.js));
};

/**
 * vendor
 */
const vendor = () => {
  return gulp
    .src(srcPath.vendor)
    .pipe(gulp.dest(distPath.vendor));
};

/**
 * php
 */
const php = () => {
  return gulp.src(srcPath.php).pipe(gulp.dest(distPath.php));
};



/**
 * 独自fontをsrc配下に読み込む際の対応
 */
const font = () => {
  return gulp.src(srcPath.font).pipe(gulp.dest(distPath.font));
};

/**
 * ローカルサーバー立ち上げ
 */
// HTML用
// const browserSyncFunc = () => {
//   browserSync.init(browserSyncOption);
// }

// const browserSyncOption = {
//   server: distBase
// }

// WordPress & Local用
function browserSyncFunc(done) {
  browserSync.init({
		//proxy: "localhost:10020", // ローカルにある「Site Domain」に合わせる
		proxy: "http://cms012a-webar.local/", // Local by Flywheelのドメイン
		// notify: false, // ブラウザ更新時に出てくる通知を非表示にする
		//open: "external", // ローカルIPアドレスでサーバを立ち上げる
		open: true,
		watchOptions: {
			debounceDelay: 1000, //1秒間、タスクの再実行を抑制
		},
	});
  done();
}

/**
 * リロード
 */
const browserSyncReload = (done) => {
  browserSync.reload();
  done();
};

/**
 *
 * ファイル監視 ファイルの変更を検知したら、browserSyncReloadでreloadメソッドを呼び出す
 * series 順番に実行
 * watch('監視するファイル',処理)
 */
const watchFiles = () => {
  gulp.watch(srcPath.scss, gulp.series(cssSass));
  gulp.watch(srcPath.html, gulp.series(html, browserSyncReload));
  gulp.watch(srcPath.js, gulp.series(js, browserSyncReload));
  gulp.watch(srcPath.vendor, gulp.series(vendor));
  gulp.watch(srcPath.img, gulp.series(imgImagemin, browserSyncReload));
  // gulp.watch(srcPath.php, gulp.series(php, browserSyncReload))
  gulp.watch(srcPath.php, gulp.series(browserSyncReload));
  gulp.watch(srcPath.font, gulp.series(font, browserSyncReload));
};

/**
 * seriesは「順番」に実行
 * parallelは並列で実行
 *
 * 一度cleanでdistフォルダ内を削除し、最新のものをdistする
 */
exports.default = gulp.series(
  clean,
  gulp.parallel(html, cssSass, js, vendor, imgImagemin, /* php,*/ font),
  gulp.parallel(watchFiles, browserSyncFunc)
);
