'use strict';

const gulp    = require('gulp')
    , sass    = require('gulp-sass')
    , plumber = require('gulp-plumber')
    , paths   = require('./../paths');

sass.compiler = require('node-sass');

module.exports = gulp.task('styles', function () {
    return gulp.src(paths.source.styles)
    .pipe(sass({
        //outputStyle: 'compressed',
        outputStyle: 'nested',
        includePaths: ['node_modules']
    }).on('error', sass.logError))
    .pipe(gulp.dest(paths.public.css));
});
