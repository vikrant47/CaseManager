const path = require('path')

module.exports = {
    entry: {
        main: './browserify/src/main.js',
       /* 'themes/nobleui/theme': './browserify/src/themes/nobleui/theme.js',*/
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, './browserify/dist')
    },
    /*optimization: {runtimeChunk: 'single'},*/
    target: "node", // or 'node' or 'node-webkit'
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
