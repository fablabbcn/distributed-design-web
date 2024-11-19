var gulp = require('gulp')
var rename = require('gulp-rename')
var svgSprite = require('gulp-svg-sprite')

var paths = {
  src: 'assets/img/icons/*.svg',
  dest: 'assets/img/',
  name: 'icons.svg',
}

var config = {
  svgSprite: {
    mode: { symbol: true },
    svg: {
      xmlDeclaration: false,
      namespaceClassnames: false,
    },
  },
}

function icons () {
  return gulp.src(paths.src)
    .pipe(svgSprite(config.svgSprite))
    .pipe(rename(paths.name))
    .pipe(gulp.dest(paths.dest))
}

function watchIcons () {
  return gulp.watch([
    paths.src,
  ], icons)
}

exports.default = icons
exports.watch = watchIcons
