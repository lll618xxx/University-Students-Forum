<template>
  <div class="registerForm">
    <el-form  label-width="80px" :model="registerForm" :rules="regValidate" ref="registerForm" @keydown.enter.native="register('registerForm')">
      <el-form-item label="手机号:" class="interval" prop="phone"> 
        <el-input v-model="registerForm.phone" prefix-icon="icon-shouji iconfont icon"></el-input>
      </el-form-item>
      <el-form-item label="用户名:" class="interval" prop="username">
        <el-input v-model="registerForm.username" prefix-icon="icon-wode iconfont icon"></el-input>
      </el-form-item>
      <el-form-item label="密码:" class="interval" prop="password">
        <el-input v-model="registerForm.password" prefix-icon="icon-mima iconfont icon" type="password"></el-input>
      </el-form-item>
      <div id="captcha" style="position: relative" v-if="showCaptcha"></div> 
      <el-form-item>
        <el-row :gutter="32">
          <el-col :span="12"><el-button type="primary" :disabled="disabled"  class="register_button" @click="register('registerForm')">注册</el-button></el-col>
          <el-col :span="12"><el-button type="primary" :disabled="disabled"  class="reset_button" @click="reset()">重置</el-button></el-col>
        </el-row>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
  import '../../utils/captcha/jigsaw.js'

  export default{
    data(){
      //验证用户名是否被注册
      const userNameCheck = (rule, value, callback) => {
        let data = {username: this.registerForm.username, mode: 1}
        this.$HttpService.register(data).then(res => {
          if (res.data.status) 
            callback()  
          else 
          callback(new Error('该用户名已被注册，请重新输入'))
        })
      };

      return{
        disabled: false,
        showCaptcha: true,
        registerForm:{
          phone: "",
          username: "",
          password: "",
        },
        regValidate:{
          phone: [
            { required: true, message: '电话号码不能为空' }, 
            { type: 'string', pattern:/^1[34578]\d{9}$/, message: '手机号码格式有误，请重新输入', trigger: 'blur'}
          ],
          username: [
            { required: true, message: '用户名不能为空' },
            { type: 'string', pattern:/^[a-zA-Z0-9_]{4,16}$/, message: '用户名应在4到16位（字母 数字 下划线）', trigger: 'blur'},
            { validator: userNameCheck, trigger: 'blur' }
          ],
          password: [
            { required: true, message: '密码不能为空', trigger: 'blur' },
            { type: 'string', min: 6, max: 18, message: '密码在6位-18位之间', trigger: 'blur' }
          ],
        },
      } 
    },
    methods:{
      register(name){
        this.$refs[name].validate((valid) => {
          if (valid) {  
            this.disabled = true
            this.$parent.flagChange(false)
            this.captcha()
          } 
        })
      },
      captcha(){
        let that = this
        jigsaw.init({
          el: document.getElementById('captcha'),
          onSuccess(){
            that.$emit('showLoading', '注册中')
            that.showCaptcha = false
            that.regSave()    
          },
          onFail(){
            
          },
          onRefresh(){
            
          }
        })
      },
      regSave(){
        let that = this
        this.$HttpService.register(this.registerForm).then(res =>{
          this.$emit('hideLoading')
          this.$parent.flagChange(true)
          if (res.data.status) {
            this.$message.success({
              message: '注册成功,即将跳转到登录页' || res.data.info,
              duration: 3000,
              onClose(){
                that.disabled = false
                that.$parent.tabChange(1)
              }
            })               
          }else{
            this.$message.error({
              message: res.data.info || '注册失败,请重试',
              showClose: true,
              duration: 0,
              onClose(){  
                that.disabled = false
                that.$refs['registerForm'].resetFields()
              }
            })
          }
        })
      },
      reset(){
        this.$refs['registerForm'].resetFields(); 
      },
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" >
  @import './common.scss';
  @import '../../utils/captcha/jigsaw.css';

  .registerForm{
    margin: 50px 0 20px 0;

    .register_button{
      color: #FFFFFF;
      cursor: pointer;
      outline: none;
      border-radius: 0;
      font-size: 14px;
      height: 30px;
      line-height: 7px;
      letter-spacing: 1px;
      width: 100%;
    }
    .reset_button{
      color: #FFFFFF;
      background: #FB271B;
      cursor: pointer;
      outline: none;
      border-radius: 0;
      border: none;
      font-size: 14px;
      height: 30px;
      line-height: 7px;
      letter-spacing: 1px;
      width: 100%;
    }
  }

  #captcha{
    margin: 0 0 30px 30px;
  }
</style>
