<template>
  <div class="notice">
    <el-badge value="new">
      <el-button class="title">公告通知<i class="more icon-right iconfont">更多</i></el-button>
    </el-badge>
    <div class="noticeList">
      <div class="item" v-for="(item, index) in noticeList">
        <i class="iconfont icon-laba icon"></i>
        <a class="content">{{item.content}}</a>
        <span class="time">{{item.time}}</span>
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
            tag: '学习交流',
            content: '这是一条学习学习交流学习交流学习交流交流学习交流学习交流交流学习交流学习交流',
            time: '2018-9-10'
          },
          {
            id: 2,
            tag: '兼职招聘',
            content: '这是一条学习学习交流学习交流学习交流',
            time: '2018-7-11'
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
    width: 280px;
    height: 295px;
    padding: 10px;
    border: 1px solid #C0C0C0;

    .title{
      width: 260px;
      height: 30px;
      line-height: 4px;
      text-align: left;
      font-size: 16px;
      background: linear-gradient(top,#FBFBFB,#EEEEEE);   /*单方向渐变*/
      background: -ms-linear-gradient(top, #FBFBFB, #EEEEEE); 
      background: -webkit-gradient(linear, left top, left bottom, from(#FBFBFB), to(#EEEEEE));
      color: #3564B9;

      .more{
        margin-left: 125px;
        font-size: 12px;
        color: #000;
      }
    }
    .noticeList{
      margin: 10px 0;

      .item{
        font-size: 12px;
        height: 24px;
        position: relative;
        cursor: pointer;
    
        .icon{
          position: absolute;
          font-size: 14px;
          top: 4.5px;
          color: #409EFF;
        }    
        .content{
          width: 190px;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
          position: absolute;
          top: 3px;
          left: 24px;
          // border: 1px solid black;
        }
        .content:hover {
          color: red;
        }
        .time{
          color: #989898;
          position: absolute;
          top: 5px;
          left: 220px;
        }
      }
    }
  }
</style>
