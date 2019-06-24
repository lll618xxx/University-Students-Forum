export default [ 
	{
		path: '/', redirect: '/home'
	},
	{
		path: '/login', name: 'login', 　// 路由懒加载写法
		component: resolve => require(['@/pages/login'], resolve)
	},
	{
		path: '/home', name: 'home',
		component: resolve => require(['@/pages/home/home'], resolve)
	},
	{
		path: '/information/:arid', name: 'information',
		component: resolve => require(['@/pages/information'], resolve)
	},
	{
		path: '/recruit', name: 'recruit',
		component: resolve => require(['@/pages/recruit'], resolve)
	},
	{
		path: '/trade', name: 'trade',
		component: resolve => require(['@/pages/trade'], resolve)
	},
	{
		path: '/user', name: 'user', 
		redirect: '/user/information',
		component: resolve => require(['@/pages/user'], resolve),
		children: [
 			{ 
 				path: 'information', name: 'user', 
 				meta: { Index: 1 },
 				component: resolve => require(['@/pages/user/information'], resolve)
 			},
 			{ 
 				path: 'publish', name: 'user', 
 				meta: { Index: 2 },
 				component: resolve => require(['@/pages/user/publish'], resolve)
 			},
 		]
	},
	{
		path: '/learn', name: 'learn',
		component: resolve => require(['@/pages/learn'], resolve)
	},
	{
		path: '/news', name: 'news',
		component: resolve => require(['@/pages/news'], resolve)
	},
]

