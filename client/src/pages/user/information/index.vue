<template>
  <div class="information container">
    <h2 class="title">个人资料</h2>
    <div class="division"></div>
    <div class="content">
      <div class="center">
        <el-row :gutter="20">
          <el-col :span="4">
            <div class="headImg" @click="modifyHeadImg()">
              <img :src="formItem.headimgurl" alt="用户头像" class="img" v-if="formItem.headimgurl" />
              <img src="../../../images/default_headimg.png" class="img" v-else/>
              <el-button type="text">修改头像</el-button>
            </div>
          </el-col>
          <el-col :span="16">
            <ul class="info">
              <li class="item">昵称:
                <span class="value">{{formItem.nickname || ''}}</span>
              </li>
              <li class="item">实名:
                <span class="value">{{formItem.realname || ''}}</span>
              </li>
              <li class="item">学校:
                <span class="value">{{formItem.school || ''}}</span>
              </li>
              <li class="item">专业:
                <span class="value">{{formItem.profession || ''}}</span>
              </li>
               <li class="item">邮箱:
                <span class="value">{{formItem.email || ''}}</span>
              </li>
              <li class="item">性别:
                <span class="value">{{formItem.sex == null ? '' : (formItem.sex == 0 ? '男' : '女')}}</span>
              </li>
              <li class="item">生日:
                <span class="value">{{formItem.birthday || ''}}</span>
              </li>
              <li class="item">简介:
                <span class="value">{{formItem.introduction || ''}}</span>
              </li>      
            </ul>
          </el-col>
           <el-col :span="4">
            <el-button type="text" @click="modifyUserInfo()">修改资料</el-button>
          </el-col>
        </el-row>
      </div>
    </div>
    <head-img ref="headImg"></head-img>
    <user-info ref="userInfo" v-bind:formItem="formItem"></user-info>  
  </div>
</template>

<script>
  import headImg from './headImg.vue'
  import userInfo from './info.vue'

  export default{
    components:{headImg, userInfo},
    data(){
      return{
        headImgVisible: false,
        formItem:{
          
        }
      } 
    },
    mounted(){
      this.getUserInfo()
    },
    computed:{
     
    },
    methods:{
       getUserInfo(){
        // if (this.$store.state.user.userinfo.username) 
        //   this.formItem = this.$store.state.user.userinfo
        // else{
          this.$store.dispatch('GetUserInfo').then(() => {
            this.formItem = this.$store.state.user.userinfo
          })
        // }
      },
      modifyHeadImg(){
        this.$refs.headImg.headImgShow()
      },
      modifyUserInfo(){
        console.log(this.formItem)
        this.$refs.userInfo.userInfoShow()
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  @import '../common.scss';
  .information{
    .content{
      margin-top: 30px;
      width: 1000px;
      height: 600px;
      background:url("http://po3frx3t5.bkt.clouddn.com/note.png");
      background-size:1000px 600px;
      background-repeat:no-repeat; 

      .center{
        // border: 1px solid black;
        margin-left :100px;
        padding-top: 50px;
        width: 820px;
        height: 500px;

        .headImg{
          display: flex;
          flex-direction: column;
  
          .img{
            width: 100px;
            height: 100px;
            margin: 0 0 10px 10px;
            cursor: pointer;
          }
        }
        .info{
          .item{
            font-size: 18px;
            margin-bottom: 20px;

            .value{
              margin-left: 10px;
              font-size: 16px;
            }
          }
        }
      }
    }
  }
</style>
