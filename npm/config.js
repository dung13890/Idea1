var config = {
  paths: {
    plugins: {
      template: {
        in: 'resources/assets/template',
        out: 'public/template'
      },
      scripts: {
        out: 'public/asset/js'
      },
      img: {
        in: 'resources/assets/img',
        out: 'public/assets/img'
      },
      bower: {
        in: 'resources/assets/bower',
        out: 'public/vendor'
      }
    }
  }
}
module.exports = config;
