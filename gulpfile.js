/**
 * Gulpfile.
 * Dax Blank.
 * @version 1.0.0
 *
 */

// Grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber'),
    bower = require('gulp-bower'),
    babel = require('gulp-babel'),
    browserSync = require('browser-sync').create();

// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
    return gulp.src('./src/sass/**/*.scss')
        .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./css/'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cssnano())
        .pipe(sourcemaps.write('.')) // Creates sourcemaps for minified styles
        .pipe(gulp.dest('./css/'))
});

// JSHint, concat, and minify JavaScript
gulp.task('site-js', function() {
  return gulp.src([

        // Custom and vendors scripts
        './src/js/vendors/*.js',
        './src/js/custom/*.js',

        // Foundation core - needed if you want to use any of the components below
          './node_modules/foundation-sites/js/foundation.core.js',
          './node_modules/foundation-sites/js/foundation.util.*.js',

          // Pick the components you need in your project
          './node_modules/foundation-sites/js/foundation.abide.js',
          './node_modules/foundation-sites/js/foundation.accordion.js',
          './node_modules/foundation-sites/js/foundation.accordionMenu.js',
          './node_modules/foundation-sites/js/foundation.drilldown.js',
          './node_modules/foundation-sites/js/foundation.dropdown.js',
          './node_modules/foundation-sites/js/foundation.dropdownMenu.js',
          './node_modules/foundation-sites/js/foundation.equalizer.js',
          './node_modules/foundation-sites/js/foundation.interchange.js',
          './node_modules/foundation-sites/js/foundation.magellan.js',
          './node_modules/foundation-sites/js/foundation.offcanvas.js',
          './node_modules/foundation-sites/js/foundation.orbit.js',
          './node_modules/foundation-sites/js/foundation.responsiveMenu.js',
          './node_modules/foundation-sites/js/foundation.responsiveToggle.js',
          './node_modules/foundation-sites/js/foundation.reveal.js',
          './node_modules/foundation-sites/js/foundation.slider.js',
          './node_modules/foundation-sites/js/foundation.sticky.js',
          './node_modules/foundation-sites/js/foundation.tabs.js',
          './node_modules/foundation-sites/js/foundation.toggler.js',
          './node_modules/foundation-sites/js/foundation.tooltip.js',
  ])
    .pipe(babel({
      presets: ['es2015'],
        compact: false
    }))
    .pipe(sourcemaps.init())
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(sourcemaps.write('.')) // Creates sourcemap for minified JS
    .pipe(gulp.dest('./js'))
});

// JSHint, concat, and minify Foundation JavaScript
gulp.task('foundation-js', function() {
  return gulp.src([

        // Foundation core - needed if you want to use any of the components below
          './node_modules/foundation-sites/js/foundation.core.js',
          './node_modules/foundation-sites/js/foundation.util.*.js',

          // Pick the components you need in your project
          './node_modules/foundation-sites/js/foundation.abide.js',
          './node_modules/foundation-sites/js/foundation.accordion.js',
          './node_modules/foundation-sites/js/foundation.accordionMenu.js',
          './node_modules/foundation-sites/js/foundation.drilldown.js',
          './node_modules/foundation-sites/js/foundation.dropdown.js',
          './node_modules/foundation-sites/js/foundation.dropdownMenu.js',
          './node_modules/foundation-sites/js/foundation.equalizer.js',
          './node_modules/foundation-sites/js/foundation.interchange.js',
          './node_modules/foundation-sites/js/foundation.magellan.js',
          './node_modules/foundation-sites/js/foundation.offcanvas.js',
          './node_modules/foundation-sites/js/foundation.orbit.js',
          './node_modules/foundation-sites/js/foundation.responsiveMenu.js',
          './node_modules/foundation-sites/js/foundation.responsiveToggle.js',
          './node_modules/foundation-sites/js/foundation.reveal.js',
          './node_modules/foundation-sites/js/foundation.slider.js',
          './node_modules/foundation-sites/js/foundation.sticky.js',
          './node_modules/foundation-sites/js/foundation.tabs.js',
          './node_modules/foundation-sites/js/foundation.toggler.js',
          './node_modules/foundation-sites/js/foundation.tooltip.js',
  ])
  .pipe(babel({
    presets: ['es2015'],
      compact: true
  }))
    .pipe(sourcemaps.init())
    .pipe(concat('foundation.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(sourcemaps.write('.')) // Creates sourcemap for minified Foundation JS
    .pipe(gulp.dest('./assets/js'))
});

// Update Foundation with Bower and save to /vendor
gulp.task('bower', function() {
  return bower({ cmd: 'update'})
    .pipe(gulp.dest('vendor/'))
});

// Browser-Sync watch files and inject changes
gulp.task('browsersync', function() {
    // Watch files
    var files = [
      './src/css/*.css',
      './src/js/*.js',
      '**/*.php',
      'src/img/**/*.{png,jpg,gif,svg,webp}',
    ];

    browserSync.init(files, {
      // Replace with URL of your local site
      proxy: "http://localhost/wordpress/blank/",
    });

    gulp.watch('./src/scss/**/*.scss', ['styles']);
    gulp.watch('./src/js/scripts/*.js', ['site-js']).on('change', browserSync.reload);

});

// Watch files for changes (without Browser-Sync)
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']);

  // Watch site-js files
  gulp.watch('./assets/js/scripts/*.js', ['site-js']);

  // Watch foundation-js files
  gulp.watch('./vendor/foundation-sites/js/*.js', ['foundation-js']);

});

// Run styles, site-js and foundation-js
gulp.task('default', function() {
  gulp.start('styles', 'site-js', 'foundation-js');
});
