import Vue from 'vue'
import Router from 'vue-router'
import routes from './config'
import store from '../store'
// import NProgress from 'nprogress' // progress bar
// import 'nprogress/nprogress.css'// progress bar style

Vue.use(Router)

const router = new Router({
  	routes,
  	// mode: 'history'     //玩好这种模式需要服务器配置
})

// 全局路由守卫
router.beforeEach((to ,from ,next) => {
	// NProgress.start()
	// to: Route: 即将要进入的目标 路由对象
  	// from: Route: 当前导航正要离开的路由
  	// next: Function: 一定要调用该方法来 resolve 这个钩子。执行效果依赖 next 方法的调用参数。
  	if (to.name == 'user') {
  		if (store.state.user.userinfo.nickname){
  			next()
  		}
  		else{
  			router.push('login')
  		}

  	}
  	next()
})

router.afterEach(to => {
  	// NProgress.done()
})

export default router