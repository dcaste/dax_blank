/**
 * Gulpfile.
 *
 * Dax Blank.
 * @version 1.0.0
 * This gulpfile is based in WPGulp (https://github.com/ahmadawais/WPGulp/) by Ahmad Awais (@ahmadawais).
 *
 */

// Project variables.
var project                 = 'DaxBlank'; // Project Name.
var projectURL              = 'http://localhost/wordpress/blank/'; // Project URL.
var productURL              = './'; // Root project folder. It's adviced to leave it like it is.

// Path to main .scss file. File name should be the same as appears in /functions/enqueque.php
var styleSRC                = './src/sass/styles.scss'; // SCSS source files.
var styleDest		            = './css/'; // Path to place compiled CSS file.

// Path to Js files. Both vendors and custom files will be compiled into one file.
var jsVendors           	  = './src/js/vendors/*.js'; // Vendor JS source files.
var jsCustom                = './src/js/custom/*.js'; // Path to JS custom source folder.
var jsDest		     		      = './js/'; // Path to place compiled JS scripts file.
var jsFile            		  = 'scripts'; // Compiled JS file name.

var imagesSRC               = './src/img/**/*.{png,jpg,gif,svg}'; // Source images which should be optimized.
var imagesDest 			        = './img/';

// Watch files paths.
var WatchStyles         	= './src/sass/*.scss'; // All *.scss files.
var WatchJSVendors      	= './src/js/vendors/*.js'; // All vendor JS files.
var WatchJSCustom   	   	= './src/js/custom/*.js'; // All custom JS files.
var WatchPHP		    	    = './**/*.php'; // All PHP files.

// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
  ];

/**
 * Load Plugins.
 */
var gulp         = require('gulp');

// CSS related plugins.
var sass         = require('gulp-sass'); // Sass compilation.
var CleanCSS     = require('gulp-clean-css'); // Minifies CSS.
var autoprefixer = require('gulp-autoprefixer'); // Autoprefixing.
var mmq          = require('gulp-merge-media-queries'); // Combine matching media.

// JS related plugins.
var concat       = require('gulp-concat'); // Concatenates JS files.
var uglify       = require('gulp-uglify'); // Minifies JS files.
var pump         = require('pump'); // Error report.

// Image related plugins.
var imagemin     = require('gulp-imagemin'); // Minify PNG, JPEG, GIF and SVG images.

// Utility related plugins.
var rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var lineec       = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems.
var filter       = require('gulp-filter'); // Enables you to work on a subset of the original files by filtering them using globbing.
var sourcemaps   = require('gulp-sourcemaps');
var notify       = require('gulp-notify'); // Sends message notification.
var browserSync  = require('browser-sync').create(); // Reloads browser and injects CSS.
var reload       = browserSync.reload; // For manual browser reload.
var sort         = require('gulp-sort'); // Recommended to prevent unnecessary changes in pot-file.


/**
 * Task: `browser-sync`.
 * Live Reloads, CSS injections, Localhost tunneling.
 */
gulp.task( 'sync', function() {
  browserSync.init( {
    proxy: projectURL,
    open: true, // Automatically open the browser with BrowserSync live server.
    injectChanges: true,
    // Use a specific port (instead of the one auto-detected by Browsersync).
    // port: 7000,
  } );
});


/**
 * Task: `styles`.
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 */
 gulp.task('styles', function () {
    gulp.src( styleSRC )
    .pipe( sourcemaps.init() )
    .pipe( sass( {
      errLogToConsole: true,
      // outputStyle: 'compact',
      // outputStyle: 'compressed',
      // outputStyle: 'nested',
      outputStyle: 'expanded',
      precision: 10
    } ) )
    .on('error', console.error.bind(console))
    .pipe( sourcemaps.write( { includeContent: false } ) )
    .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( autoprefixer( AUTOPREFIXER_BROWSERS ) )

    .pipe( sourcemaps.write ( styleDest ) )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( styleDest ) )

    .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
    .pipe( mmq( { log: true } ) ) // Merge Media Queries only for .min.css version.

    .pipe( browserSync.stream() ) // Reloads style.css if that is enqueued.

    .pipe( rename( { suffix: '.min' } ) )
    .pipe( CleanCSS())
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( styleDest ) )

    .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
    .pipe( browserSync.stream() )// Reloads style.min.css if that is enqueued.
    .pipe( notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) )
 });


 /**
  * Task: `vendorJS`.  *
  * Concatenate and uglify vendor JS scripts.
  */
 gulp.task( 'vendorsJs', function() {
  gulp.src( jsVendors )
    .pipe( concat( jsFile + '.js' ) )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( jsDest ) )
    .pipe( rename( {
      basename: jsFile,
      suffix: '.min'
    }))
    .pipe( uglify() )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( jsDest ) )
    .pipe( notify( { message: 'TASK: "vendorsJs" Completed! 💯', onLast: true } ) );
 });

/**
  * Task: `customJS`.
  *
  * Concatenate and uglify custom JS scripts.
  *
  * This task does the following:
  *     1. Gets the source folder for JS custom files
  *     2. Concatenates all the files and generates custom.js
  *     3. Renames the JS file with suffix .min.js
  *     4. Uglifes/Minifies the JS file and generates custom.min.js
  */
 gulp.task( 'customJS', function() {
    gulp.src( jsCustom )
    .pipe( concat( jsCustom + '.js' ) )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( jsDest ) )
    .pipe( rename( {
      basename: jsFile,
      suffix: '.min'
    }))
    .pipe( uglify() )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( jsDest ) )
    .pipe( notify( { message: 'TASK: "customJs" Completed! 💯', onLast: true } ) );
 });


 /**
  * Task: `images`.
  *
  * Minifies PNG, JPEG, GIF and SVG images.
  *
  * This task does the following:
  *     1. Gets the source of images raw folder
  *     2. Minifies PNG, JPEG, GIF and SVG images
  *     3. Generates and saves the optimized images
  *
  * This task will run only once, if you want to run it
  * again, do it with the command `gulp images`.
  */
 gulp.task( 'images', function() {
  gulp.src( imagesSRC )
    .pipe( imagemin( {
          progressive: true,
          optimizationLevel: 3, // 0-7 low-high
          interlaced: true,
          svgoPlugins: [{removeViewBox: false}]
        } ) )
    .pipe(gulp.dest( imagesDest ))
    .pipe( notify( { message: 'TASK: "images" Completed! 💯', onLast: true } ) );
 });

 /**
  * Watch Tasks.
  *
  * Watches for file changes and runs specific tasks.
  */
 gulp.task( 'default', ['styles', 'vendorsJs', 'customJS', 'images', 'sync'], function () {
  gulp.watch( WatchPHP, reload ); // Reload on PHP file changes.
  gulp.watch( WatchStyles, [ 'styles' ] ); // Reload on SCSS file changes.
  gulp.watch( WatchJSVendors, [ 'vendorsJs', reload ] ); // Reload on vendorsJs file changes.
  gulp.watch( WatchJSCustom, [ 'customJS', reload ] ); // Reload on customJS file changes.
 });