const path = require('path');


module.exports = {
  // entry: ['./resources/js/main.js'],
  // output: {
  //   filename: 'main.js',
  //   path: path.join(__dirname, './public/js')
  // },
  entry: {
    main: ['./resources/js/main.js'],
    asyncImages: ['babel-polyfill', './resources/js/asyncImages.js']
  },
  output: {
    filename: '[name].js',
    path: path.join(__dirname, './public/js')
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
            plugins: ['@babel/plugin-proposal-object-rest-spread', '@babel/plugin-transform-runtime']
          }
        }
      },
    ]
  }
};
