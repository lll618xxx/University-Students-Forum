<template>
  <div class="hot">
    <el-badge value="hot">
      <el-button class="hottitle">热点消息<i class="more icon-right iconfont">更多</i></el-button>
    </el-badge>
    <div class="hotList">
      <div class="item" v-for="(item, index) in hotList" @click="toskin(item.arid)">
        <span class="category">[ {{item.category}} ]</span>
        <a class="title">{{item.title}}</a>
        <span class="date">{{item.date}}</span>
      </div>
    </div>
  </div>
</template>

<script>
 
  export default{
   
    data(){
      return{
        hotList: []
      } 
    },
    mounted(){
      this.$HttpService.getArticleList().then(res => {
        this.hotList = res.data.data
      })
    },
    methods:{
      toskin(id){
        let arid = id
        this.$router.push({ path: `/information/${arid}` })
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  // @import '../../common/style/standard/standard.scss';
  // Vue引入sass并配置全局变量 https://www.jianshu.com/p/22d8a43c0c92
  .hot{
    width: 325px;
    height: 295px;
    padding: 10px;
    border: 1px solid #C0C0C0;
    overflow: hidden;

    .hottitle{
      width: 305px;
      height: 30px;
      line-height: 4px;
      text-align: left;
      font-size: 16px;
      background: linear-gradient(top,#FBFBFB,#EEEEEE);   /*单方向渐变*/
      background: -ms-linear-gradient(top, #FBFBFB, #EEEEEE); 
      background: -webkit-gradient(linear, left top, left bottom, from(#FBFBFB), to(#EEEEEE));
      color: #3564B9;

      .more{
        margin-left: 175px;
        font-size: 12px;
        color: #000;
      }
    }
    .hotList{
      margin: 10px 0;

      .item{
        font-size: 12px;
        height: 24px;
        position: relative;
        cursor: pointer;

        .category{
          color: #1304FD;
          margin-right: 5px;
          position: absolute;
          top: 2px;
        }
        .title{
          width: 180px;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
          position: absolute;
          top: 3px;
          left: 70px;
        }
        .title:hover {
          color: red;
        }
        .date{
          margin-left: 5px;
          color: #989898;
          position: absolute;
          top: 5px;
          left: 255px;
        }
      }
    }
  }

</style>
