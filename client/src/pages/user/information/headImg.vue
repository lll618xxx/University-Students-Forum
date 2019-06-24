<template>
  <el-dialog title="头像上传" :visible.sync="Visible" width="30%">
   <el-upload v-if="!haveSelect" class="upload-demo" drag :action="actionUrl" multiple :onSuccess="success">
      <i class="el-icon-upload"></i>
      <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
      <div class="el-upload__tip" slot="tip">只能上传jpg/png文件，且不超过500kb</div>
    </el-upload>
    <div class="preview" v-else>
      <img :src="localImgUrl" class="image" />
      <div class="operate">
        <el-button class="back" size="small" @click="back()">返回</el-button>
        <el-button class="save" size="small" @click="save()">保存</el-button>
      </div>
    </div>
  </el-dialog>
</template>

<script>
  import {upload} from '@/utils/qiniu'
  import actionPath from '@/http/CustomPath'

  export default{
    data(){
      return{
        Visible: false,
        haveSelect: false,
        localImgUrl: '',
        actionUrl: '',
        imgKey: ''
      } 
    },
    mounted(){
      this.actionUrl = actionPath.getQiniuToken
    },
    methods:{
      success(response, file, fileList){
        //交给七牛上传,返回的key可以根据后台接口获得图片
        let key = upload(file.raw, response.data)
        this.imgKey = key  
        this.haveSelect = true
        this.localImgUrl = file.url
      },
      back(){
        this.haveSelect = false
      },
      headImgShow(){
        this.Visible = true
      },
      save(){
        let that = this
        this.$HttpService.putUserInfo({portrait: this.imgKey}).then(res => {
          if (res.data.status) {
            this.$message.success({
              message: res.data.info || '保存成功',
              duration: 1500,
              onClose(){
                that.Visible = false
                that.haveSelect = false
                that.$parent.getUserInfo()
              }
            });                
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
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .preview{
    display: flex;

    .image{
      width: 200px;
      height: 200px;
    }
    .operate{
      margin-left: 30px;
      padding-top: 168px;
      .back{
        background-color: #E0E0E0;
      }
      .save{
        background-color: #409EFF;
        color: #FFFFFF;
      }
    }
  }
</style>
