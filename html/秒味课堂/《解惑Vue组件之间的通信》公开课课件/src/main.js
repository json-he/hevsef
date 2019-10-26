import Vue from 'vue'
import App from './App.vue'
import store from './store'
import './registerServiceWorker'

Vue.config.productionTip = false

// 作为插件

Vue.use({
  install(Vue){
    Vue.prototype.$eventBus = new Vue;
  }
})

new Vue({
  store,
  render: h => h(App)
}).$mount('#app')
