<template>
  <el-container style="position: absolute; height:100%;width: 100%;">
    <el-aside width="200px" style="">
      <div class="userInfo">
        <img :src="formItem.headimgurl" alt="用户头像" class="headImg" v-if="formItem.headimgurl" />
        <img src="../../images/default_headimg.png" class="headImg" v-else/>
        <span class="username">{{formItem.nickname || '您还没有昵称呢'}}</span>
      </div>
      <div class="sideBar">
        <a class="barLink" v-bind:style="{ color: activeBar == 1 ? '#FBE72E' : ''}"  @click="toSkip('information')"><i class="icon-moban iconfont icon"></i>个人资料</a>
        <a class="barLink" v-bind:style="{ color: activeBar == 2 ? '#FBE72E' : ''}" @click="toSkip('publish')"><i class="icon-write iconfont icon"></i>发布信息</a>
        <a class="barLink" @click="back()"><i class="icon-shouye iconfont icon"></i>返回首页</a>
      </div>
    </el-aside>
    
      <el-main style="">
        <router-view></router-view>
      </el-main>
    
  </el-container>
</template>

<script>
  export default {
    data() {
      return{
        formItem:{}
      } 
    },
    mounted(){
      this.getUserInfo()
      // this.activeBar = this.$route.meta.Index
    },
    computed:{
      activeBar(){
        return this.$route.meta.Index
      }
    },
    methods:{
      getUserInfo(){
        if (this.$store.state.user.userinfo.username) 
          this.formItem = this.$store.state.user.userinfo
        else{
          this.$store.dispatch('GetUserInfo').then(() => {
            this.formItem = this.$store.state.user.userinfo
          })
        }
      },
      toSkip(route){
        this.$router.push(route)
      },
      back(){
        this.$router.push('../home')
      }
    }
  };
</script>

<style lang="scss" scoped>
  @import './index.scss';
</style>
