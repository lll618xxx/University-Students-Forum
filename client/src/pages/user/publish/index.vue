<template>
  <div class="container publish">
    <h2 class="title">发布信息</h2>
    <div class="division"></div>
    <div class="content">
      <input type="text" placeholder="请输入文章标题" v-model="title" class="articleTitle" />
      <div class="category">
        <span>请选择文章类别：</span>
        <el-radio-group v-model="cgid">
          <el-radio-button label="1">学习交流</el-radio-button>
          <el-radio-button label="2">兼职招聘</el-radio-button>
          <el-radio-button label="3">二手买卖</el-radio-button>
          <el-radio-button label="4">新闻分享</el-radio-button>
        </el-radio-group>
      </div>
      <div ref="editor"  class="toolbar"></div>
      <div ref="editors"  class="text"></div>
      <div class="but_group">
        <el-button type="primary" v-on:click="publishArticle">发表文章</el-button>
        <el-button v-on:click="saveAsDraft">存为草稿</el-button>
      </div>
    </div>
  </div>

</template>

<script>
	import E from 'wangeditor'
  import actionPath from '@/http/CustomPath'

  export default {
    name: 'editor',
    data () {
      return {
        editorContent: '',
        title: '',
        cgid: '1',
        category: ['学习交流', '兼职招聘', '二手买卖', '新闻分享']
      }
    },
    methods: {
      publishArticle() {
        if(!this.validateTitle())
          return
        let params = {}
        let that = this
        params.status = 1
        params.cgid = this.cgid
        params.title = this.title
        params.content = this.editorContent
        params.promulgator = this.$store.state.user.userinfo.nickname
        params.category = this.category[this.cgid-1]

        this.$HttpService.postArticle(params).then(res => {
          if (res.data.status) {
            this.$message.success({
              message: res.data.info || '提交成功',
              duration: 1500,
              onClose(){
               that.$router.push('../home')
              }
            })               
          }else{
            this.$message.error({
              message: ' 提交失败，请重试' || res.data.info,
              showClose: true,
              duration: 0,
            })
          }
        })
      },
      saveAsDraft(){

      },
      validateTitle(){
        if (this.title == '') {
          this.$message.warning({
            message: '文章标题不能为空',
            showClose: true,
            duration: 3000,
          })
          return false
        }
        if (this.title.length > 40) {
          this.$message.warning({
            message: '文章标题字数不能大于40',
            showClose: true,
            duration: 3000,
          })
          return false
        }
        return true
      }
     
    },
    mounted() {
      var editor = new E(this.$refs.editor, this.$refs.editors)
      editor.customConfig.onchange = (html) => {
        this.editorContent = html
      }
      editor.customConfig.uploadImgServer = actionPath.qiniuServerUpload
      editor.customConfig.uploadFileName = 'file'
      editor.customConfig.zIndex = 3
      editor.customConfig.uploadImgHooks = {
        customInsert: function (insertImg, result, editor) {
          console.log(result.url)
          insertImg(result.url)
        }
      }

      editor.create()
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  @import '../common.scss';
  .publish{
    .content{
      .articleTitle{
        height: 46px;
        width: 100%;
        font-size: 24px;
        margin: 10px 0;
      }
      .category{
        margin: 5px 0 20px 0;
        span{
          font-size: 14px;
          color: #3459FD;
          margin-right: 30px;
        }
      }
      .but_group{
        margin-top: 30px;
      }
    }
  }
  .toolbar {
    border: 1px solid #ccc;
  }
  .text {
    border: 1px solid #ccc;
    height: 400px;
  } 
</style>
