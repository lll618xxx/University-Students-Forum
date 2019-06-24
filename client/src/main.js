// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import HttpService from './http/HttpService'
import store from './store'
import router from './router'

// import VConsole from 'vconsole/dist/vconsole.min.js' //import vconsole
// const vConsole = new VConsole() // 初始化


Vue.prototype.$HttpService = HttpService

Vue.config.productionTip = false

Vue.use(ElementUI)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,			   //通过在根实例中注册 store 选项
  render: h => h(App)  //vue2.0的写法
})
