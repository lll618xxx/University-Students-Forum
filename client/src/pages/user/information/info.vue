<template>
  <el-dialog title="修改资料" :visible.sync="infoVisible" width="30%">
    <el-form ref="formItem" :model="formItem" label-width="80px" size="mini" :rules="formValidate">
      <el-form-item label="昵称：" prop="nickname">
        <el-input v-model="formItem.nickname"></el-input>
      </el-form-item>
      <el-form-item label="实名："  prop="realname">
        <el-input v-model="formItem.realname"></el-input>
      </el-form-item>
       <el-form-item label="学校："  prop="school">
        <el-input v-model="formItem.school"></el-input>
      </el-form-item>
       <el-form-item label="专业："  prop="profession">
        <el-input v-model="formItem.profession"></el-input>
      </el-form-item>
       <el-form-item label="邮箱："  prop="email">
        <el-input v-model="formItem.email"></el-input>
      </el-form-item>
       <el-form-item label="性别：" prop="sex">
        <el-radio-group v-model="formItem.sex">
          <el-radio label="0">男</el-radio>
          <el-radio label="1">女</el-radio>
        </el-radio-group>
      </el-form-item>
      <el-form-item label="生日：" prop="birthday">
        <el-col :span="11">
          <el-date-picker type="date" placeholder="选择日期" v-model="formItem.birthday" style="width: 100%;" value-format="yyyy-MM-dd"></el-date-picker>
        </el-col>
      </el-form-item>
      <el-form-item label="简介：" prop="introduction">
        <el-input type="textarea" v-model="formItem.introduction"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit('formItem')">保存</el-button>
        <el-button @click="cancel()">取消</el-button>
      </el-form-item>
    </el-form>
  </el-dialog>
</template>

<script>

  export default{
    props: ['formItem'],
    data(){
      //验证昵称是否被占用
      const nickNameCheck = (rule, value, callback) => {
        let data = {nickname: this.formItem.nickname}
        if(this.$store.state.user.userinfo.nickname == this.formItem.nickname)
          callback()  
        
        this.$HttpService.nickNameCheck(data).then(res => {
          if (res.data.status) 
            callback()  
          else 
            callback(new Error('该昵称已经有主了，请换个试试'))
        })
      };

      return{
        infoVisible: false,
        formValidate:{
          email: [
            { type: 'email', message: '邮箱格式有误，请重新输入', trigger: 'blur'}
          ],
          nickname: [
            { required: true, message: '昵称不能为空', trigger: 'blur' }, 
            { validator: nickNameCheck, trigger: 'blur' }
          ]
        }  
      } 
    },
    mounted(){
      // console.log(this.formItem)
      // this.formItem = this.$store.state.user.userinfo
    },
    methods:{
      userInfoShow(){
        this.infoVisible = true
      },
      cancel(){
        this.infoVisible = false
      },
      onSubmit(name){
        let that = this
        this.$refs[name].validate((valid) => {
          if (valid) {  
            // console.log(this.formItem)
            this.$HttpService.putUserInfo(this.formItem).then(res => {
              if (res.data.status) {
              this.$message.success({
                  message: res.data.info || '保存成功',
                  duration: 1500,
                  onClose(){
                   that.infoVisible = false
                  }
                })               
              }else{
                this.$message.error({
                  message: '保存失败，请重试' || res.data.info,
                  showClose: true,
                  duration: 0,
                  onClose(){  
                    
                  }
                })
              }
            })
          } 
        })
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .el-dialog__wrapper{
    top: -40px;
  }

</style>
