import { getToken, setToken, removeToken } from '@/utils/cookies/cookies'
import $HttpService from '@/http/HttpService'

const user = {
	state:{
		userinfo: {},
		token: getToken() || ''
	},
	mutations:{
		SET_USERINFO: (state, userinfo) => state.userinfo = userinfo,
		SET_TOKEN: (state, token) => state.token = token,
	},
	actions:{
		//获取用户信息
		GetUserInfo({commit}){
			return new Promise((resolve, reject) => {
				$HttpService.getUserInfo().then(res => {
					commit('SET_USERINFO', res.data.data)
					resolve()
				}).catch(error => {
	          		reject(error)
	        	})
	        })
		},
		//登出
		LogOut({commit}){
			removeToken()
			commit('SET_TOKEN', '')
			commit('SET_USERINFO', {})
		}
	}
}

export default user