var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('hello', function(done) {
    console.log('Hello trupti');
    done();
  });

gulp.task('reload',function(done){
  browserSync.reload();
  done();
})
  

 gulp.task('browser-sync',function(){
    browserSync.init({
      open:'external',
      host:'localhost',
      proxy:'http://localhost:8886/bitcoin/bitcoin/web/',
      
      
    });
  });
  gulp.task('sass', function() {
    return gulp.src('scss/styles.scss') // Gets all files ending with .scss in app/scss
      .pipe(sass())
      .pipe(gulp.dest('css'))
      .pipe(browserSync.reload({
        stream: true
      }))
  });
  gulp.task('watch', gulp.parallel('browser-sync', function(){
    gulp.watch('scss/**/*.scss', gulp.series('sass')); 
    // Other watchers
  }));
