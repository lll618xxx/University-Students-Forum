<template>
  <div class="menu">
     <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" background-color="#545c64" text-color="#fff" active-text-color="#ffd04b" router >
      <el-menu-item index="home">
        <i class="iconfont icon-iconset0111 icon"></i>首页
      </el-menu-item>
      <el-menu-item index="learn">
        <i class="iconfont icon-xuexi icon"></i>学习交流
      </el-menu-item>
      <el-menu-item index="recruit">
        <i class="iconfont icon-zhaopin icon"></i>兼职招聘
      </el-menu-item>
      <el-menu-item index="trade">
        <i class="iconfont icon-jiaoyi icon"></i>二手买卖
      </el-menu-item>
      <el-menu-item index="news">
        <i class="iconfont icon-yueduxinwengonggao icon"></i>新闻分享
      </el-menu-item>
    </el-menu>
  </div>
</template>

<script>
 
  export default{
    props:['cgids'],
    data(){
      return{
        activeIndex: 'home',
      } 
    },
    mounted(){
      this.activeIndex = this.choose()
    },
    methods:{
      choose(){
        switch(this.cgids){
          case 0:
            return 'home'
            break
          case 1:
            return 'learn'
            break
          case 2:
            return 'recruit'
            break
          case 3:
            return 'trade'
            break
          case 4:
            return 'news'
            break
        }
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped> 
  .menu{
    width: 100%;
    min-width: 1263px;
    background-color: #545c64;

    .icon{
      font-size: 26px;
      margin-right: 4px;
    }
  }

  .el-menu{
    margin-left: 60px;
  }
</style>
