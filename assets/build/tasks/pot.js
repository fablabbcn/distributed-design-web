var gulp = require('gulp')
var gulpif = require('gulp-if')
var del = require('del')
var wpPot = require('gulp-wp-pot')
var rename = require('gulp-rename')
var replace = require('gulp-replace')

var paths = {
  src: 'views/**/*.twig',
}

var config = {
  textDomain: 'ddmp',
  twigFiles: 'views/**/*.twig',
  phpFiles: '**/*.php',
  cacheFolder: 'views/cache',
  destFolder: 'languages',
  keepCache: true,
}

function generate () {
  return gulp.src(config.phpFiles)
    .pipe(wpPot({ domain: config.textDomain }))
    .pipe(gulp.dest(config.destFolder + '/' + config.textDomain + '.pot'))
    .pipe(gulpif(!config.keepCache, del.bind(null, [config.cacheFolder], { force: true })))
}

function compile () {
  del.bind(null, [config.cacheFolder], { force: true })

  var gettextRegex = {
    simple: /(__|_e|translate|esc_attr__|esc_attr_e|esc_html__|esc_html_e)\(\s*?['"].+?['"]\s*?,\s*?['"].+?['"]\s*?\)/g,
    plural: /_n\(\s*?['"].*?['"]\s*?,\s*?['"].*?['"]\s*?,\s*?.+?\s*?,\s*?['"].+?['"]\s*?\)/g,
    disambiguation: /(_x|_ex|_nx|esc_attr_x|esc_html_x)\(\s*?['"].+?['"]\s*?,\s*?['"].+?['"]\s*?,\s*?['"].+?['"]\s*?\)/g,
    noop: /(_n_noop|_nx_noop)\((\s*?['"].+?['"]\s*?),(\s*?['"]\w+?['"]\s*?,){0,1}\s*?['"].+?['"]\s*?\)/g,
  }

  // Iterate over .twig files
  return gulp.src(config.twigFiles)

    // Search for Gettext function calls and wrap them around PHP tags.
    .pipe(replace(gettextRegex.simple, function (match) { return '<?php ' + match + '; ?>' }))
    .pipe(replace(gettextRegex.plural, function (match) { return '<?php ' + match + '; ?>' }))
    .pipe(replace(gettextRegex.disambiguation, function (match) { return '<?php ' + match + '; ?>' }))
    .pipe(replace(gettextRegex.noop, function (match) { return '<?php ' + match + '; ?>' }))

    // Rename file with .php extension
    .pipe(rename(function (filePath) { filePath.extname = '.php' }))

    // Output the result to the cache folder as a .php file.
    .pipe(gulp.dest(config.cacheFolder))
}

var pot = gulp.series(compile, generate)

function watchPot () {
  return gulp.watch([
    paths.src,
  ], pot)
}

exports.default = pot
exports.generate = generate
exports.compile = compile
exports.watch = watchPot
