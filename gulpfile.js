
const args = require( 'yargs' ).argv,
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS = require( 'gulp-clean-css' ),
    concat = require( 'gulp-concat' ),
    dependents = require( 'gulp-dependents' ),
    gulp = require('gulp'),
    gulpdebug = require('gulp-debug'),
    gulpif = require( 'gulp-if' ),
    newer = require( 'gulp-newer' ),
    rename = require( 'gulp-rename' ),
    sass = require( 'gulp-dart-sass' ),
    sourcemaps = require( 'gulp-sourcemaps' ),
    strip = require( 'gulp-strip-comments' ),
    uglify = require( 'gulp-uglify' );

let SRC = 'web/assets/src/',
    STATIC = 'web/assets/dist/';

const PRODUCTION = typeof( args.prod ) !== 'undefined' ? true : false,
    DEBUG = typeof( args.debug ) !== 'undefined' ? true : false;

const scripts = function() {
    return gulp.src( [ 
        SRC + "js/vendor/**/*.js", 
        SRC + "js/global.js" 
        ], { since: gulp.lastRun( scripts ) } )
        .pipe( gulpif( DEBUG, gulpdebug( { minimal: false } ) ) )
        .pipe( strip() )
        .pipe( uglify() )
        .pipe( concat( 'app.js' ) )
        .pipe( gulp.dest( STATIC + "js/" ) );
}

const styles = function() {
    return gulp.src( SRC + "scss/index.scss", { since: gulp.lastRun( styles ) } )
        .pipe( dependents() )
        .pipe( gulpif( DEBUG, gulpdebug( { minimal: false } ) ) )
        .pipe( gulpif( ! PRODUCTION, sourcemaps.init() ) )
        .pipe( sass().on( 'error', sass.logError ) )
        .pipe( gulpif( PRODUCTION, autoprefixer( {
            browserlist: ['last 2 versions'],
            cascade: false
        } ) ) )
        .pipe( gulpif( PRODUCTION, cleanCSS( { compatibility: 'ie8' } ) ) )
        .pipe( gulpif( ! PRODUCTION, sourcemaps.write() ) )
        .pipe( rename( 'app.css' ) )
        .pipe( gulp.dest( STATIC + "css/" ) );
};

const graphic = function() {
    return gulp.src( SRC + 'graphic/**/*.{jpg,jpeg,png,gif}' )
        .pipe( gulpif( DEBUG, gulpdebug( { minimal: false } ) ) )
        .pipe( newer( STATIC +'graphic/' ) )
        .pipe( gulp.dest( STATIC +'graphic/' ) );
}

const video = function() {
    return gulp.src( SRC + 'video/*.*' )
        .pipe( gulpif( DEBUG, gulpdebug( { minimal: false } ) ) )
        .pipe( newer( STATIC +'video/' ) )
        .pipe( gulp.dest( STATIC +'video/' ) );
}

const svgs = function() {
    return gulp.src( SRC + 'graphic/**/*.svg' )
        .pipe( gulpif( DEBUG, gulpdebug( { minimal: false } ) ) )
        .pipe( newer( STATIC +'graphic/' ) )
        .pipe( gulp.dest( STATIC +'graphic/' ) );
}

const watch = function( done ) {
    gulp.watch( SRC + "js/**/*.js", gulp.series( 'scripts' ) );
    gulp.watch( SRC + "scss/**/*.scss", gulp.series( 'styles' ) );
    gulp.watch( SRC + "graphic/**/*.{jpg,jpeg,png,gif}", gulp.series( 'graphic' ) );
    gulp.watch( SRC + "graphic/**/*.svg", gulp.series( 'svgs' ) );
    gulp.watch( SRC + "video/**/*.*", gulp.series( 'video' ) );
    
    done();
}

gulp.task( 'scripts', function() { return scripts(); } );
gulp.task( 'styles', function() { return styles(); } );
gulp.task( 'graphic', function() { return graphic(); } );
gulp.task( 'svgs', function() { return svgs(); } );
gulp.task( 'video', function() { return video(); } );
gulp.task( 'watch', function() { return watch(); } );

gulp.task( 'build', gulp.series( 'styles', 'scripts', 'graphic' ) );

gulp.task( 'default', gulp.series( watch ) );