'use strict';

const gulp     = require('gulp');
const plumber  = require('gulp-plumber');
const imagemin = require('gulp-imagemin');
const paths    = require('./../paths');

module.exports = gulp.task('images', function(){
    return gulp.src(paths.source.images)
    .pipe(plumber())
    .pipe(imagemin({
        progressive: true
    }))
    .pipe(gulp.dest(paths.public.images))
});
