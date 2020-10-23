const path = require('path')

module.exports = {
    entry: './browserify/src/main.js',
    output: {
        filename: 'webpack.bundle.js',
        path: path.resolve(__dirname, './browserify/dist')
    },
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
                    options: {
                    }
                }
            }
        ]
    },
}
