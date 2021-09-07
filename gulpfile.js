var gulp     = require('gulp'),
    rename   = require('gulp-rename'),
    jshint   = require('gulp-jshint'),
    less     = require('gulp-less'),
    cleanCss = require('gulp-clean-css'),
    uglify   = require('gulp-uglify'),
    plumber  = require('gulp-plumber'),
    gutil    = require('gulp-util'),
    notify   = require('gulp-notify')
    concat   = require('gulp-concat')
    strip    = require('gulp-strip-comments');

// error notification settings for plumber
var onError = function(err) {
    var lineNumber = (err.lineNumber) ? 'LINE ' + err.lineNumber + ' -- ' : '';
    notify.onError({
        title: 'Task Failed [' + err.plugin + ']',
        sound: "Ping",
        message: lineNumber + 'See console.'
    })(err);

    // Pretty error reporting
    var report = '';
    var chalk = gutil.colors.white.bgRed.bold;

    report += chalk('TASK:') + ' [' + err.plugin + ']\n';
    report += chalk('PROB:') + ' ' + err.message + '\n';
    if (err.lineNumber) { report += chalk('LINE:') + ' ' + err.lineNumber + '\n'; }
    if (err.fileName)   { report += chalk('FILE:') + ' ' + err.fileName + '\n'; }
    console.error(report);
    this.emit('end');
};


/* ------------------------------------------------------------------------------
 *
 *  Begin core assets tasks
 *
 * ---------------------------------------------------------------------------- */

 // Lint task
gulp.task('lint', function() {
    return gulp
        .src('public/assets/js/core/app.js')                 // lint core JS file. Or specify another path
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile our less files
gulp.task('less', function() {
    return gulp
        .src('public/assets/less/_main/*.less')              // locate /less/ folder root to grab 4 main files
        .pipe(less())                                 // compile
        .pipe(gulp.dest('public/assets/css'))                // destination path for normal CSS
        .pipe(cleanCss({                             // minify CSS
            specialComments: 0                    // remove all comments
        }))                              // minifiy css
        .pipe(rename({                                // rename file
            suffix: ".min"                            // add *.min suffix
        }))
        .pipe(gulp.dest('public/assets/css/'));               // destination path for minified CSS
});

// Minify template's core JS file
gulp.task('minify_core', function() {
    return gulp
        .src('public/assets/js/core/app.js')                 // path to app.js file
        .pipe(uglify())                               // compress JS
        .pipe(rename({                                // rename file
            suffix: ".min"                            // add *.min suffix
        }))
        .pipe(gulp.dest('public/assets/js/core/'));          // destination path for minified file
});


/* ------------------------------------------------------------------------------
 *
 *  End of core assets tasks
 *
 * ---------------------------------------------------------------------------- */


/* ------------------------------------------------------------------------------
 *
 *  Below is costums themes tasks
 *
 * ---------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------
 *  Scope lint & minifiy .js file
 * ---------------------------------------------------------------------------- */

gulp.task('customjs', function() {
    return gulp
    .src(['public/assets/themes/js/custom.js'])
    .pipe(plumber({
        errorHandler: onError
    }))
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(uglify())
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/assets/themes/js/'))
});


gulp.task('initialjs', function() {
    return gulp
    .src(['public/assets/themes/plugins/initial/initial.js'])
    .pipe(plumber({
        errorHandler: onError
    }))
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(uglify())
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/assets/themes/plugins/initial/'))
});

gulp.task('modaljs', function() {
    return gulp
    .src(['public/assets/themes/plugins/modal/bootstrap-modal.js'])
    .pipe(plumber({
        errorHandler: onError
    }))
    .pipe(uglify())
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/assets/themes/plugins/modal/'))
});

gulp.task('minipagejs', function() {
    return gulp
    .src(['public/assets/themes/js/pages/src/*.js'])
    .pipe(plumber({
        errorHandler: onError
    }))
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(uglify())
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/assets/themes/js/pages/'))
});

// make core js themes theme one file
var path_corejs = [
    'public/assets/js/core/libraries/bootstrap.min.js',
    'public/assets/js/plugins/loaders/blockui.min.js',
    'public/assets/themes/plugins/jscookie/js.cookie.min.js',
    'public/assets/themes/plugins/initial/initial.min.js',
    'public/assets/themes/js/custom.min.js'
];

/* ------------------------------------------------------------------------------
 *  Scope minifiy .css file
 * ---------------------------------------------------------------------------- */
gulp.task('iconcss', function() {
    return gulp
    .src('public/assets/css/icons/icomoon/styles.css')
    .pipe(cleanCss({
        specialComments: 0
    }))
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/assets/css/icons/icomoon/'));
});

gulp.task('customcss', function() {
    return gulp
    .src('public/assets/themes/css/custom.css')
    .pipe(cleanCss({
        specialComments: 0
    }))
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/assets/themes/css/'));
});

gulp.task('modalcss', function() {
    return gulp
    .src('public/assets/themes/plugins/modal/bootstrap-modal.css')
    .pipe(cleanCss({
        specialComments: 0
    }))
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/assets/themes/plugins/modal/'));
});

gulp.task('font', function() {
    return gulp
    .src('public/assets/fonts/roboto/main.css')
    .pipe(cleanCss({
        specialComments: 0
    }))
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/assets/fonts/roboto/'));
});

/* ------------------------------------------------------------------------------
 *
 *  End of cutoms themes tasks
 *
 * ---------------------------------------------------------------------------- */

// watch changed file
gulp.task('watch', function() {

    gulp.watch('public/assets/js/core/app.js', gulp.series(             // listen for changes in app.js file and automatically compress
        'lint',                                       // lint
        //'concatenate',                              // concatenate & minify JS files (uncomment if in use)
        'minify_core'                                 // compress app.js
    ));
    gulp.watch('public/assets/less/**/*.less', gulp.series('less'));    // listen for changes in all LESS files and automatically re-compile


    // custom themes watch css
    gulp.watch('public/assets/themes/css/custom.css', gulp.series('customcss'));
    gulp.watch('public/assets/fonts/roboto/main.css', gulp.series('font'));
    gulp.watch('public/assets/css/icons/icomoon/styles.css', gulp.series('iconcss'));
    gulp.watch('public/assets/themes/plugins/modal/bootstrap-modal.css', gulp.series('modalcss'));

    // custom themes watch css
    gulp.watch('public/assets/themes/js/custom.js', gulp.series('customjs'));
    gulp.watch('public/assets/themes/js/pages/src/*.js', gulp.series('minipagejs'));
    gulp.watch('public/assets/themes/plugins/modal/bootstrap-modal.js', gulp.series('modaljs'));
    gulp.watch('public/assets/themes/plugins/initial/initial.js', gulp.series('initialjs'));
});

// default run
gulp.task('default', gulp.series(
    'lint',
    'less',
    'minify_core',
    // cutoms themes tasks
    'customcss',
    'font',
    'iconcss',
    'modalcss',
    'customjs',
    'minipagejs',
    'modaljs',
    'initialjs',
    'watch'
));