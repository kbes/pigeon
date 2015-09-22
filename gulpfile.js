var gulp = require('gulp'),
    sass = require('gulp-sass'),
    livereload = require('gulp-livereload'),
    autoprefixer = require('gulp-autoprefixer'),
    notify = require('gulp-notify'),
    browserify = require('gulp-browserify'),
    rename = require('gulp-rename');

var stylesSrcDir = 'resources/assets/scss/',
    stylesDistDir = 'public/css/';

gulp.task('scss', function() {
 gulp.src(stylesSrcDir + 'main.scss')
     .pipe(sass().on('error', function(err) {
      notify(err);
      console.log(err)
     }))
     .pipe(autoprefixer({
      browsers: ['last 2 versions']
     }))
     .pipe(gulp.dest(stylesDistDir))
     .pipe(livereload());
});

gulp.task('js', function() {
 gulp.src('resources/assets/js/main.js', {read: false})
     .pipe(browserify({
      debug: true,
      transform: 'concatenify'
     }))
     .pipe(rename('bundle.js'))
     .pipe(gulp.dest('public/js'));
});

gulp.task('watch', function() {
 livereload.listen();

 gulp.watch(stylesSrcDir + '*.scss', ['scss']);
 gulp.watch('resources/assets/js/controllers/*.js', ['js']);

});

gulp.task('default', ['scss', 'js', 'watch']);