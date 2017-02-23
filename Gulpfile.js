var gulp        = require('gulp');
var sass        = require('gulp-sass');

gulp.task('sass', function () {
    return gulp.src('./resources/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./assets/css'));
});

gulp.task('scripts', function () {
    return gulp.src(['./node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', './resources/js/*.js'])
        .pipe(gulp.dest('./assets/js'));
});

gulp.task('fonts', function () {
    var dirs = ['./node_modules/font-awesome/fonts/*']

    return gulp.src(dirs)
        .pipe(gulp.dest('./assets/fonts'))
});

gulp.task('watch', function () {
    gulp.watch('./resources/sass/*.scss', ['sass']);
});
