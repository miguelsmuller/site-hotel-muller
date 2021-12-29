'use strict';

module.exports = {
  source: {
    views   : '../theme/src/views/**/!(_)*.pug',
    styles  : '../theme/src/styles/**/!(_)*.scss',
    scripts : '../theme/src/scripts/**/*.js',
    images  : '../theme/src/images/**/*'
  },
  public: {
    html   : '../theme/dist/',
    css    : '../theme/dist/styles/',
    js     : '../theme/dist/scripts',
    images : '../theme/dist/images'
  }
}
