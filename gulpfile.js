var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var sassDataURI = require('lib-sass-data-uri');
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const merge = require('gulp-merge');
const strip = require('gulp-strip-comments');


gulp.task('parse-template-scss', function() {
    return gulp.src('src/templates/backupmonkey-boilerplate/scss/template.scss')
        .pipe(sass({
            errLogToConsole: true,
            functions: Object.assign(sassDataURI, {other: function() {}})
        }))
        .pipe(cleanCSS({compatibility: 'ie11'}))
        .pipe(gulp.dest('src/templates/backupmonkey-boilerplate/css'))
});

gulp.task('parse-critical-scss', function() {
    return gulp.src('src/templates/backupmonkey-boilerplate/scss/critical.scss')
        .pipe(sass({
            errLogToConsole: true,
            functions: Object.assign(sassDataURI, {other: function() {}})
        }))
        .pipe(cleanCSS({compatibility: 'ie11'}))
        .pipe(gulp.dest('src/templates/backupmonkey-boilerplate/css'))
});

gulp.task('parse-script', function() {
  merge(
    gulp.src(['src/templates/backupmonkey-boilerplate/js/template.js'])
      .pipe(sourcemaps.init())
      .pipe(babel({
        presets: ['@babel/env']
      }))
      .pipe(sourcemaps.write())
  )
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(strip())
    .pipe(concat('template.min.js'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('src/templates/backupmonkey-boilerplate/js'));
});

gulp.task('watch', function() {
    gulp.watch('src/templates/backupmonkey-boilerplate/scss/**/*.scss', gulp.series('parse-template-scss'));
    gulp.watch('src/templates/backupmonkey-boilerplate/scss/**/*.scss', gulp.series('parse-critical-scss'));
    gulp.watch('src/templates/backupmonkey-boilerplate/js/*.js', gulp.series('parse-script'));
});

gulp.task('default', function() {
    gulp.run('watch');
});

