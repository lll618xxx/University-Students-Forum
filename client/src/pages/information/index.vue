<template>
  <div class="main_info">
    <my-header style="position: static" v-bind:routerNumber="routerNumber"></my-header>
    <div class="info_container">
      <div class="article">
        <h1 class="articleTitle">{{articleItem.title || ''}}</h1>
        <div class="info">
          <i style="margin-right: 20px;">{{articleItem.promulgator || ''}}</i>
          <i>{{articleItem.datetime || ''}}</i>
        </div>
        <div v-html="articleItem.content" class="content">{{articleItem.content}}</div>
        <div class="readnum"><span>阅读数：{{articleItem.readnum}}</span></div>
      </div>
      <div class="advertise">
        <img src="../../images/gallery/u=24301770,733698703&fm=26&gp=0.jpg" alt="广告招商位置" style="width: 280px; height: 280px " />
        <img src="../../images/gallery/u=964279065,2961570563&fm=26&gp=0.jpg" alt="广告招商位置" style="width: 280px; height: 280px " />
        <img src="../../images/gallery/u=1199163515,3172323255&fm=26&gp=0.jpg" alt="广告招商位置" style="width: 280px; height: 280px " />
        <img src="../../images/gallery/u=2418338367,4193930718&fm=26&gp=0.jpg" alt="广告招商位置" style="width: 280px; height: 280px " />
      </div>
    </div>
    <my-footer></my-footer>
  </div>
</template>

<script>
  import myHeader from '../header'
  import myFooter from '../footer'

  export default{
    components:{myHeader, myFooter},
    data(){
      return{
        routerNumber: 2,
        articleItem: {}
      } 
    },
    mounted(){
      this.$HttpService.getArticle({arid : this.$route.params.arid}).then(res => {
        this.articleItem = res.data.data
      })
    },
    methods:{
      
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
  @import './config.scss';
  .info_container{
    width: 1200px;
    margin: 20px auto;
    display: flex;
    // border: 1px solid black;

    .article{
      width: 830px;

      .articleTitle{
        font-size: 38px;
        color: #4d4f53;
        letter-spacing: 1px;
        font-weight: 700;
      }
      .info{
        margin: 20px 0;

        i{
          font-size: 18px;
          color: #777;
        }
      }
      .content{
  
      }
      .readnum{
        margin-top: 30px;
        position: relative;

        span{
          position: absolute;
          right: 10px;
          color: #888888;
          font-size: 12px;
        }
      }
    }
    .advertise{
      background-color: #F0F0F0;
      width: 280px;
      margin-left: 60px;
      padding: 10px 15px;
      height: 1200px;

      img{
        cursor: pointer;
        margin: 10px 0;
      }
    }
  }

</style>
