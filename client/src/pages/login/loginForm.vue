<template>
  <div class="loginForm">
    <el-form  label-width="80px" :model="loginForm" :rules="loginValidate" ref="loginForm" @keydown.enter.native="login('loginForm')">
      <el-form-item label="用户名:" class="interval" prop="username">
        <el-input v-model="loginForm.username" prefix-icon="icon-wode iconfont icon"></el-input>
      </el-form-item>
      <el-form-item label="密码:" class="interval" prop="password">
        <el-input v-model="loginForm.password" prefix-icon="icon-mima iconfont icon" type="password"></el-input>
      </el-form-item>
      <el-form-item>
       <el-button type="primary" class="login_button" :disabled="disabled" @click="login('loginForm')">登录</el-button>
        <el-button type="primary" class="found_pwd_button" :disabled="disabled" @click="foundPassword()">忘记密码?</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
  import {setToken} from '@/utils/cookies/cookies'

  export default{
    data(){
      return{
        disabled: false,
        loginForm:{
          username: "",
          password: "",
        },
        loginValidate:{
          username: [
            { required: true, message: '用户名不能为空', trigger: 'blur'},
          ],
          password: [
            { required: true, message: '密码不能为空', trigger: 'blur'}, 
          ],
        }  
      } 
    },
    methods:{
      login(name){
        let that = this
        this.$refs[name].validate((valid) => {
          if(valid){ 
            this.$emit('showLoading', '登录中')
            this.disabled = true
            this.$HttpService.login(this.loginForm).then(res =>{
              // console.log(this.loginForm)
              this.$emit('hideLoading')
              if (res.data.status) {
                this.$message.success({
                  message: res.data.info || '登录成功',
                  duration: 1500,
                  onClose(){
                    //登录成功后跳转到home页，同时设置cookie
                    that.disabled = false
                    setToken(res.data.token)
                    that.$store.commit('SET_TOKEN', res.data.token)
                    that.$router.push('home')
                  }
                });                
              }else{
                this.$message.error({
                  message: '账号或密码错误,登录失败' || res.data.info,
                  showClose: true,
                  duration: 0,
                  onClose(){  
                    that.disabled = false
                    // that.$refs['loginForm'].resetFields()
                  }
                })
              }
            }) 
          } 
        })
      },
      foundPassword(){

      },
      reset(){
        this.$refs['loginForm'].resetFields()
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
  @import './common.scss';
	.loginForm{
    margin: 50px 0 20px 0;

    .el-form-item__label{
      color: #D6ECE2;
    }
    .el-input__inner{
      height: 36px;
      background:transparent;
      border-radius: 0;
      border: 1px solid #d9d9ce;   
      outline: none;
      color: #FFFFFF;
      letter-spacing: 1.3px;
      border-radius: 6px;
      line-height: 36px;
    }
    .el-input__icon{
      margin-left: 5px;
    }
    .el-input--prefix .el-input__inner{
      padding-left: 40px;
    }

    .login_button{
      color: #FFFFFF;
      cursor: pointer;
      outline: none;
      border-radius: 0;
      font-size: 18px;
      width: 80%;
      height: 30px;
      line-height: 7px;
      letter-spacing: 8px;
      margin: 10px auto;
    }
    .found_pwd_button{
      margin: 10px auto 0px auto;
      color: #aed2e2;
      background:transparent;
      cursor: pointer;
      outline: none;
      border-radius: 0;
      border: none;
      font-size: 6px;
      width: 80%;
      height: 30px;
      line-height: 10px;
      letter-spacing: 1px;
    }
  }

  .icon{
    color: #D6ECE2;
  }
  .interval{
    margin: 40px 0;
  }
</style>
