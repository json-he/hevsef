1.vue create my-vue-app
2. create vue.config.js (使用自定义配置的方法)
```
    const title = '双11剁手啦'
    const port = '1111'
    module.exports = {
        publicPath: '/wxy',
        //自定义端口号
        devServer: {
            port
        },
        //自定义变量
        configureWebpack: {
            name: title
        }
    }

```
3. 使用vue-router

npm install vue-router

创建router.js与mian.js同级



