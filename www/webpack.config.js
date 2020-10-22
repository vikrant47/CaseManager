const path = require('path')

module.exports = {
    entry: './browserify/main.js',
    output: {
        filename: 'webpack.bundle.js',
        path: path.resolve(__dirname, './browserify')
    },
    "target": "node"
}
