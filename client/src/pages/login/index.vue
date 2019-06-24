<template>
  <div>
    <div id="particles"></div>
    <h2 class="title">大学生活,由此改变</h2>
    <div class="form" v-loading="loading" :element-loading-text="loadingText" element-loading-background="transparent">
      <div class="tab">
        <div :class="[loginActive ? 'activeTab' : '','tabpane']" @click="tabChange(1)">登录</div>
        <div :class="[!loginActive ? 'activeTab' : '','tabpane']" @click="tabChange(0)">注册</div>
      </div>
      <div class="content">
        <div class="login" v-show="loginActive">
          <login-form v-on:showLoading="showLoading" v-on:hideLoading="hideLoading" ref="login"></login-form>
        </div>
        <div class="register" v-show="!loginActive">
          <register-form v-on:showLoading="showLoading" v-on:hideLoading="hideLoading" ref="register"></register-form>
        </div>
      </div>
    </div>
    <div class="copyright">© 2019 Simple Login and Signup Form. All rights reserved | Design by magic_xiang</div>
  </div>
</template>

<script>
	import particles from 'particles.js'
  import config from './bg-animation/default'
  import loginForm from './loginForm'
  import registerForm from './registerForm'
    
  export default{
    components: {loginForm, registerForm},
    data(){
      return{
        loginActive: 1,
        loading: false,
        loadingText: '',
        tabChangeFlag: true
      } 
    },
    mounted(){
	    particlesJS('particles', config);
    },
    methods:{
      tabChange(args){
        if (this.tabChangeFlag) {
          if (!this.loginActive == args) {
            this.loginActive = !this.loginActive
            this.$refs.login.reset()
            this.$refs.register.reset()
          }  
        }
      },
      flagChange(flag){
        this.tabChangeFlag = flag
      },
      showLoading(title){
        [this.loading, this.loadingText] = [true, title]
      },
      hideLoading(title){
        this.loading = false
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  @import 'index.scss';
	#particles{
    position: fixed;
  	width: 100%;
  	height: 100%;
    background-image: url('../../images/bg.jpg');
    background-size: cover;
    background-attachment: fixed;
  	background-position: 50% 50%;  
    z-index: -1;  
 }
</style>
