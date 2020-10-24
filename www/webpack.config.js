const path = require('path')

module.exports = {
    entry: {
        main: './browserify/src/main.js',
        /*'themes/nobleui/theme': './browserify/src/themes/nobleui/theme.js',*/
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, './browserify/dist')
    },
    /*optimization: {
        splitChunks: {
            chunks: 'async',
            minSize: 20000,
            minRemainingSize: 0,
            maxSize: 0,
            minChunks: 1,
            maxAsyncRequests: 30,
            maxInitialRequests: 30,
            automaticNameDelimiter: '~',
            enforceSizeThreshold: 50000,
            cacheGroups: {
                defaultVendors: {
                    test: /[\\/]node_modules[\\/]/,
                    priority: -10
                },
                default: {
                    minChunks: 2,
                    priority: -20,
                    reuseExistingChunk: true
                }
            }
        }
    },*/
    target: "web", // or 'node' or 'node-webkit'
    externals: {
        fs: "commonjs fs",
        path: "commonjs path"
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {}
                }
            }
        ]
    },
}
