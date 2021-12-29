'use strict';

const gulp  = require('gulp')
    , paths = require('./../paths');

module.exports = gulp.task('watch', function(){
  gulp.watch('src/styles/**/*.scss', ['styles']);
  gulp.watch(paths.source.scripts, ['scripts']);
  gulp.watch(paths.source.images, ['images']);
});
