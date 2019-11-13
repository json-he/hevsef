const title = '双11剁手啦'
const port = '1111'
module.exports = {
    // publicPath: '/wxy',
    //自定义端口号
    devServer: {
        port
    },
    //自定义变量
    configureWebpack: {
        name: title
    }
}
