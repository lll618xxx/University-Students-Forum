import Vue from 'vue'
import Vuex from 'vuex'
import user from './modules/user'

Vue.use(Vuex)//在创建Vue实例之前

const store = new Vuex.Store({
  	modules:{
        user
    }
  	
})

export default store