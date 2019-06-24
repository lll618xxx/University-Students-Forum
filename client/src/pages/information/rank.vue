<template>
  <div class="notice">
    <el-badge value="hot">
      <el-button class="title">高校热点排行<i class="more icon-right iconfont">更多</i></el-button>
    </el-badge>
    <div class="noticeList">
      <div class="item" v-for="(item, index) in noticeList">
        <i :class="[item.sort > 3 ? 'rank4' : 'rank'+item.sort, 'icon']">{{item.sort}}</i>
        <a class="content">{{item.content}}</a>
        <span class="time">{{item.hotnum}}</span>
        <i v-if="item.trend" class="icon-web-icon-1 iconfont trend" style="color: #41AD42"></i>
        <i v-else class="icon-web-icon- iconfont trend" style="color: #F23F40"></i>
      </div>
    </div>
  </div>
</template>

<script>
 
  export default{
   
    data(){
      return{
        noticeList:[
          {
            id: 1,
            sort: 1,
            content: '广东石油化工学院',
            hotnum: 1212,
            trend: 1,
          },
          {
            id: 2,
            sort: 2,
            content: '华南理工大学',
            hotnum: 511,
            trend: 0,
          },
          {
            id: 3,
            sort: 3,
            content: '中山大学',
            hotnum: 441,
            trend: 0,
          },
          {
            id: 4,
            sort: 4,
            content: '清华大学',
            hotnum: 348,
            trend: 1,
          },
          {
            id: 5,
            sort: 5,
            content: '北京大学',
            hotnum: 285,
            trend: 1,
          },
          {
            id: 6,
            sort: 6,
            content: '中山电子科技大学',
            hotnum: 123,
            trend: 0,
          },
          {
            id: 7,
            sort: 7,
            content: '南开大学',
            hotnum: 88,
            trend: 0,
          }
        ]
      } 
    },
    methods:{
      
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  // @import '../../common/style/standard/standard.scss';
  // Vue引入sass并配置全局变量 https://www.jianshu.com/p/22d8a43c0c92
  .notice{
    width: 224px;
    height: 295px;
    padding: 10px;
    border: 1px solid #C0C0C0;

    .title{
      width: 220px;
      height: 30px;
      line-height: 4px;
      text-align: left;
      font-size: 16px;
      background: linear-gradient(top,#FBFBFB,#EEEEEE);   /*单方向渐变*/
      background: -ms-linear-gradient(top, #FBFBFB, #EEEEEE); 
      background: -webkit-gradient(linear, left top, left bottom, from(#FBFBFB), to(#EEEEEE));
      color: #3564B9;

      .more{
        margin-left: 55px;
        font-size: 12px;
        color: #000;
      }
    }
    .noticeList{
      margin: 10px 0;

      .item{
        font-size: 12px;
        height: 36px;
        position: relative;
        cursor: pointer;
        line-height: 32px;
        // border: 1px solid black;
    
        .icon{
          position: absolute;
          top: 8px;
          width: 20px;
          height: 20px;
          border-radius: 50%;
          text-align: center;
          line-height: 20px; 
          font-size: 13px;
          font-weight: bold; 
        }    
        .rank1{
          background: linear-gradient(top,#FEF0A1, #F4C533); 
          color: #844921;
        }
        .rank2{
          background: linear-gradient(top,#DBDCE8, #ACA6C9); 
          color: #313556;
        }
        .rank3{
          background: linear-gradient(top,#EDBB7A, #E78639); 
          color: #934815;
        }
        .rank4{
          color: #A78A68;
        }
        .content{
          width: 140px;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
          position: absolute;
          top: 3px;
          left: 24px;
          margin-left: 10px;
          // border: 1px solid black;
        }
        .content:hover {
          color: red;
        }
        .time{
          color: #40B8FF;
          position: absolute;
          top: 2px;
          left: 168px;
        }
        .trend{
          position: absolute;
          top: 2px;
          right: 0px;
          font-size: 14px;
        }
      }
    }
  }
</style>
