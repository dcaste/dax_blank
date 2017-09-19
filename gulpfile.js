/**
 * Gulpfile.
 *
 * Dax Blank.
 * @version 1.0.0
 * Based in https://github.com/ahmadawais/WPGulp by Ahmad Awais (@ahmadawais).
 *
 */

/**
 * Configuration.
 */

// Project related.
var project                 = 'DaxBlank'; // Project Name.
var projectURL              = 'http://localhost/wordpress/blank/'; // Local project URL
var productURL              = './'; // Theme/Plugin URL. Leave it like it is.

// Translation related.
var text_domain             = 'dax_blank'; // Your textdomain here.
var destFile                = 'dax_blank.pot'; // Name of the transalation file.
var packageName             = 'dax_blank'; // Package name.
var bugReport               = 'http://daxcastellon.com/contacto/'; // Where can users report bugs.
var lastTranslator          = 'Dax Castellon <dax@daxcastellon.com>'; // Last translator Email ID.
var team                    = 'Dax Castellon <dax@daxcastellon>'; // Team's Email ID.
var translatePath           = './languages' // Where to save the translation files.

// Style related.
var styleSRC                = './src/sass/styles.scss'; // Path to main .scss file.
var styleDestination        = './assets/css/'; // Path to place the compiled CSS file.

// JS Vendor related.
var jsVendorSRC             = './src/js/vendors/*.js'; // Path to JS vendor folder.
var jsVendorDestination     = './src/js/vendors/'; // Path to place the compiled JS vendors file.
var jsVendorFile            = 'vendors'; // Compiled JS vendors file name.

// JS Custom related.
var jsCustomSRC             = './src/js/custom/*.js'; // Path to JS custom scripts folder.
var jsCustomDestination     = './assets/js/'; // Path to place the compiled JS custom scripts file.
var jsCustomFile            = 'scripts'; // Compiled JS custom file name.

// jQuery related.
var jquerySRC             = './node_modules/jquery/dist/jquery.js';
var jqueryDestination     = './assets/js/';
var jqueryFile            = 'jquery'; // Compiled JS custom file name.

// Foundation JS related.
var jsFoundationDestination     = './assets/js/';
var jsFoundationFile            = 'foundation'; // Compiled Foundation JS file name.
var jsFoundationSRC = [
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
	];

// Images related.
var imagesSRC               = './src/img/**/*.{png,jpg,gif,svg}'; // Source folder of images to be optimized.
var imagesDestination       = './assets/img/'; // Destination folder of optimized images.

// Watch files paths.
var styleWatchFiles         = './src/sass/**/*.scss'; // Path to all *.scss files inside css folder and inside them.
var vendorJSWatchFiles      = './src/js/vendors/*.js'; // Path to all vendor JS files.
var customJSWatchFiles      = './src/js/custom/*.js'; // Path to all custom JS files.
var projectPHPWatchFiles    = './**/*.php'; // Path to all PHP files.


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

// STOP Editing Project Variables.

/**
 * Load Plugins.
 *
 * Load gulp plugins and passing them semantic names.
 */
var gulp         = require('gulp'); // Gulp of-course

// CSS related plugins.
var sass         = require('gulp-sass'); // Gulp pluign for Sass compilation.
var minifycss    = require('gulp-uglifycss'); // Minifies CSS files.
var autoprefixer = require('gulp-autoprefixer'); // Autoprefixing magic.
var mmq          = require('gulp-merge-media-queries'); // Combine matching media queries into one media query definition.

// JS related plugins.
var concat       = require('gulp-concat'); // Concatenates JS files
var uglify       = require('gulp-uglify'); // Minifies JS files
var babel   	 = require('gulp-babel');

// Image realted plugins.
var imagemin     = require('gulp-imagemin'); // Minify PNG, JPEG, GIF and SVG images with imagemin.

// Utility related plugins.
var rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var lineec       = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems.
var filter       = require('gulp-filter'); // Enables you to work on a subset of the original files.
var sourcemaps   = require('gulp-sourcemaps'); // Maps code in a compressed file.
var notify       = require('gulp-notify'); // Sends message notification to you.
var browserSync  = require('browser-sync').create(); // Reloads browser and injects CSS.
var reload       = browserSync.reload; // For manual browser reload.
var wpPot        = require('gulp-wp-pot'); // For generating the .pot file.
var sort         = require('gulp-sort'); // Recommended to prevent unnecessary changes in pot-file.

/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 *
 * This task does the following:
 *    1. Sets the project URL
 *    2. Sets inject CSS
 *    3. You may define a custom port
 *    4. You may want to stop the browser from openning automatically
 */
gulp.task( 'browser-sync', function() {
  browserSync.init( {

	// For more options
	// @link http://www.browsersync.io/docs/options/

	// Project URL.
	proxy: projectURL,

	// `true` Automatically open the browser with BrowserSync live server.
	// `false` Stop the browser from automatically opening.
	open: true,

	// Inject CSS changes.
	// Commnet it to reload browser for every CSS change.
	injectChanges: true,

	// Use a specific port (instead of the one auto-detected by Browsersync).
	// port: 7000,

  } );
});


/**
 * Task: `styles`.
 * Compiles Sass. Use it in development.
 *
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

	.pipe( sourcemaps.write ( './' ) )
	.pipe( lineec() )
	.pipe( gulp.dest( styleDestination ) )

	.pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
	.pipe( mmq( { log: true } ) ) // Merge Media Queries only for .min.css version.

	.pipe( browserSync.stream() ) // Reloads style.css if that is enqueued.

	.pipe( notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) )
 });

 /**
  * Task: `minify-styles`.
  * Compiles Sass, Autoprefixes it and Minifies CSS. Use it in production.
  *
  */
  gulp.task('minify-styles', function () {
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

 	.pipe( sourcemaps.write ( './' ) )
 	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
 	.pipe( gulp.dest( styleDestination ) )

 	.pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
 	.pipe( mmq( { log: true } ) ) // Merge Media Queries only for .min.css version.

 	.pipe( browserSync.stream() ) // Reloads style.css if that is enqueued.

 	.pipe( rename( { suffix: '.min' } ) )
 	.pipe( minifycss( {
 	  maxLineLen: 10
 	}))
 	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
 	.pipe( gulp.dest( styleDestination ) )

 	.pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
 	.pipe( browserSync.stream() )// Reloads style.min.css if that is enqueued.
 	.pipe( notify( { message: 'TASK: "minify-styles" Completed! 💯', onLast: true } ) )
  });


 /**
  * Task: `vendorJS`.
  * Concatenate and uglify vendor JS scripts.
  *
  */
 gulp.task( 'vendorsJs', function() {
  gulp.src( jsVendorSRC )
	.pipe( concat( jsVendorFile + '.js' ) )
	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
	.pipe( gulp.dest( jsVendorDestination ) )
	.pipe( rename( {
	  basename: jsVendorFile,
	  suffix: '.min'
	}))
	.pipe( uglify() )
	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
	.pipe( gulp.dest( jsVendorDestination ) )
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
	gulp.src( jsCustomSRC )
	.pipe( concat( jsCustomFile + '.js' ) )
	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
	.pipe( gulp.dest( jsCustomDestination ) )
	.pipe( rename( {
	  basename: jsCustomFile,
	  suffix: '.min'
	}))
	.pipe( uglify() )
	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
	.pipe( gulp.dest( jsCustomDestination ) )
	.pipe( notify( { message: 'TASK: "customJs" Completed! 💯', onLast: true } ) );
 });

 /**
  * Task: `jquery`.
  * Concatenate and uglify jQuery if you need jQuery to be enqueued separately.
  */
 gulp.task( 'jquery', function() {
	gulp.src( jquerySRC )
	.pipe( concat( jqueryFile + '.js' ) )
	.pipe( lineec() )
	.pipe( gulp.dest( jqueryDestination ) )
	.pipe( rename( {
	  basename: jqueryFile,
	  suffix: '.min'
	}))
	.pipe( uglify() )
	.pipe( lineec() )
	.pipe( gulp.dest( jqueryDestination ) )
	.pipe( notify( { message: 'TASK: "jquery" Completed! 💯', onLast: true } ) );
 });

 /**
  * Task: `foundationJS`.
  * Concatenate and uglify Foundation JS files if you need Foundation to be enqueued separately.
  * Foundation is saved in src/js/vendors by default to be concatenated with other JS files.
  */
 gulp.task( 'foundationJS', function() {
	return gulp.src( jsFoundationSRC )
	.pipe(babel({
		presets: ['es2015'],
	    compact: true
	}))
	.pipe( concat( jsFoundationFile + '.js' ) )
	.pipe( lineec() )
	.pipe( gulp.dest( jsVendorDestination ) ) // You can use Foundation or Vendor destination.
	.pipe( rename( {
	  basename: jsFoundationFile,
	  suffix: '.min'
	}))
	.pipe( uglify() )
	.pipe( lineec() )
	.pipe( gulp.dest( jsVendorDestination ) )
	.pipe( notify( { message: 'TASK: "foundationJS" Completed! 💯', onLast: true } ) );
 });

 /**
  * Task: `allJS`.
  * Concatenate and uglify all JS scripts in a single file.
  *
  */
 gulp.task( 'allJS', function() {
	return gulp.src( [jquerySRC,jsVendorSRC,jsCustomSRC] )
	.pipe(babel({
		presets: ['es2015'],
	    compact: true
	}))
	.pipe( concat( jsCustomFile + '.js' ) )
	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
	.pipe( gulp.dest( jsCustomDestination ) )
	.pipe( rename( {
	  basename: jsCustomFile,
	  suffix: '.min'
	}))
	.pipe( uglify() )
	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
	.pipe( gulp.dest( jsCustomDestination ) )
	.pipe( notify( { message: 'TASK: "allJs" Completed! 💯', onLast: true } ) );
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
	.pipe(gulp.dest( imagesDestination ))
	.pipe( notify( { message: 'TASK: "images" Completed! 💯', onLast: true } ) );
 });


 /**
  * WP POT Translation File Generator.
  *
  * * This task does the following:
  *     1. Gets the source of all the PHP files
  *     2. Sort files in stream by path or any custom sort comparator
  *     3. Applies wpPot with the variable set at the top of this file
  *     4. Generate a .pot file of i18n that can be used for l10n to build .mo file
  */
 gulp.task( 'translate', function () {
	 return gulp.src( projectPHPWatchFiles )
		 .pipe(sort())
		 .pipe(wpPot( {
			 domain        : text_domain,
			 destFile      : destFile,
			 package       : packageName,
			 bugReport     : bugReport,
			 lastTranslator: lastTranslator,
			 team          : team
		 } ))
		.pipe(gulp.dest(destFile))
		.pipe( notify( { message: 'TASK: "translate" Completed! 💯', onLast: true } ) )

 });


 /**
  * Watch Tasks.
  *
  * Watches for file changes and runs specific tasks.
  */
 gulp.task( 'default', ['styles', 'vendorsJs', 'customJS', 'images', 'browser-sync'], function () {
  gulp.watch( projectPHPWatchFiles, reload ); // Reload on PHP file changes.
  gulp.watch( styleWatchFiles, [ 'styles' ] ); // Reload on SCSS file changes.
  gulp.watch( vendorJSWatchFiles, [ 'vendorsJs', reload ] ); // Reload on vendorsJs file changes.
  gulp.watch( customJSWatchFiles, [ 'customJS', reload ] ); // Reload on customJS file changes.
 });