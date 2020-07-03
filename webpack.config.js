
// Herramientas y dependencia
const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const autoprefixer = require('autoprefixer')
const webpack = require('webpack')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')

// PLugins

const extractCss = new MiniCssExtractPlugin({
  filename: '../../style.css'
})

const loaderPostCss = new webpack.LoaderOptionsPlugin({
  options: {
    postcss: [
      autoprefixer()
    ]
  }
})

const browserSync = new BrowserSyncPlugin(
  {
  host: 'localhost',
  port: 3000,
  // Change this to your prefered port
  proxy: 'http://localhost:8080/Compra-en-Quintero',
  files: [
      {
          match: [
              '**/*.php'
          ],
          fn: function(event, file) {
              if (event === "change") {
                  const bs = require('browser-sync').get('bs-webpack-plugin');
                  bs.reload();
              }
          }
      }
  ]
})

// Reglas
const jsRules = {
  test: /\.js$/,
  exclude: /node_modules/,
  use: {
    loader: 'babel-loader',
    options: {
      presets: ['@babel/preset-env']
    }
  }
}

const cssRules = {
  test: /\.(css|sass|scss)$/,
  use: [
    MiniCssExtractPlugin.loader,
    {
      loader: 'css-loader',
      options: {
        importLoaders: 2,
        sourceMap: true
      }
    },
    {
      loader: 'postcss-loader',
      options: {
        plugins: () => [
          require('autoprefixer'),
          require('cssnano')({
            preset: 'default'
          })
        ],
        sourceMap: true
      }
    },
    {
      loader: 'sass-loader',
      options: {
        sourceMap: true
      }
    }
  ]
}

const imgRules = {
  test: /\.(gif|png|jpe?g|svg)/i,
  use: [
    {
      loader: 'file-loader',
      options: {
        name: '[name].[ext]',
        outputPath: '../img/'
      }
    },
    {
      loader: 'image-webpack-loader',
      options: {
        mozjpeg: {
          progressive: true,
          quality: 65
        },
        optipng: {
          enabled: false,
        },
        pngquant: {
          quality: [0.65, 0.90],
          speed: 4
        },
        gifsicle: {
          interlaced: false,
        },
        webp: {
          quality: 75
        }
      }
    }
  ]
}


// Modulo principal
module.exports = {
  entry: path.resolve(__dirname, './src/app.js'),
  output: {
    path: path.resolve(__dirname, './assets/js'),
    // filename: 'inicio.[contentHash].js'
    filename: 'bundle.js',
    sourceMapFilename: '[file].map'
  },
  devtool: 'source-map',
  module: {
    rules: [jsRules, cssRules, imgRules]
  },
  plugins: [extractCss, loaderPostCss, browserSync]
}
