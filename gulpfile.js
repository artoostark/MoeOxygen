var path = require('path');
var gulp = require('gulp'),
    less = require('gulp-less'),
    concat = require('gulp-concat');

gulp.task('less', function () {
  return gulp.src('./assets/style/style.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./public/css'));
});

gulp.task('concat', function() {
    gulp.src(['./public/css/**/*.css'])
        .pipe(concat('style.css'))
        .pipe(gulp.dest('./public/dist/css/'));
});

// gulp.task('style', ['less', 'concat']);
gulp.task('style', ['less']);
