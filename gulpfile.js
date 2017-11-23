var gulp            = require('gulp'),
    sass            = require('gulp-sass'),
    browserSync     = require('browser-sync'),
    autoprefixer    = require('gulp-autoprefixer');

gulp.task('sass', function(){
    return gulp.src('resources/assets/sass/**/*.sass')
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
        .pipe(gulp.dest('public/css'));
});

// gulp.task('browser-sync', function(){
//     browserSync({
//         server: {
//             baseDir: 'app'
//         },
//         notify: false
//     });
// });

gulp.task('watch', ['sass'], function(){
    gulp.watch('app/sass/**/*.sass', ['sass']);
    // gulp.watch('app/*.html', browserSync.reload);
    // gulp.watch('app/js/**/*.js', browserSync.reload);
});

gulp.task('default', ['watch']);