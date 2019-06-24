<template>
  <div v-loading.fullscreen="loading" element-loading-text="拼命加载中"
    element-loading-spinner="el-icon-loading"
    element-loading-background="rgba(255,255,0,0)">
    <home-menu class="homeMenu" v-bind:cgids="cgid"></home-menu>
    <div class="mainframe">
      <div class="maintop">
        <div class="navmenu">
          <el-badge value="NEW" class="tag">
             <el-button type="text" class="textbut" @click="resort('time')">最新</el-button>
          </el-badge>
          <el-badge value="HOT" class="tag">
            <el-button type="text" class="textbut" @click="resort('readnum')">最热</el-button>
          </el-badge>
          <div class="side">
            <span class="interval" style="margin-right:110px;">作者</span>
            <!-- <span class="interval">回复</span> -->
            <span class="interval">阅读数</span>
            <span class="interval" style="margin-right:30px;">发表时间</span>
          </div>
        </div>
        <div class="dataList">
          <a class="item" v-for="(item, index) in dataList" @click="toskin(item.arid)">
            <span class="title">{{item.title}}</span>
            <span class="dataside">
              <span class="promulgator">{{item.promulgator}}</span>
              <span class="readnum">{{item.readnum}}</span>
              <span class="date">{{item.date}}</span>
            </span>
          </a>
        </div>
      </div>
        <div class="page">
          <el-button type="primary" @click="publishArticle()">发表文章</el-button>
          <pagination class="pagination" v-bind:totalPage="totalPage"></pagination>
        </div>
    </div>
  </div>
 
</template>

<script>
  import pagination from './pagination.vue'
  import homeMenu from '../home/homeMenu.vue'

  export default{
    props:['cgid'],
    components:{pagination, homeMenu},
    data(){
      return{
        dataList:[],
        field: 'time',
        sort: 'desc',
        totalPage: 0,
        currentPage: 1,
        limit: 20,
        loading: false
      } 
    },
    mounted(){
     this.getArticleList(this.field, this.sort)
     // console.log(this.cgid)
    },
    methods:{
      toskin(arid){
        this.$router.push(`information/${arid}`)
      },
      resort(field){
        if (field == this.field) {
          this.sort == 'desc' ? (this.sort = 'asc') : (this.sort = 'desc')
        }else{
          this.field = field
          this.sort = 'desc'
        }
        this.getArticleList(this.field, this.sort)
      },
      getArticleList(fields, sorts, p){
        let field = fields || this.field
        let sort  = sorts  || this.sort
        if (p) 
          this.currentPage = p

        this.loading = true
        this.dataList = []

        this.$HttpService.getArticleList({cgid: this.cgid, field: field, sort: sort, p: this.currentPage, limit: this.limit}).then(res => {
          // console.log(res.data.status)
          this.loading = false
          this.dataList = res.data.data
          this.totalPage = res.data.other.totalPage*10
        })
      },
      publishArticle(){
        this.$router.push('user/publish')
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .homeMenu{
    margin-top: 5px;
  }
  .mainframe{
    width: 1200px;
    margin: 20px auto;
    
    .maintop{
      border: 1px solid #C0C4CC;
    }
    .navmenu{
      height: 40px;
      font-size: 16px;
      position: relative;
      display: flex;
      background: linear-gradient(top,#05CEDC,#059DA7);   /*单方向渐变*/
      // background: -ms-gradient(linear, left top, left bottom, from(#05CEDC), to(#059DA7));
      // background: -moz-gradient(linear, left top, left bottom, from(#05CEDC), to(#059DA7));
      // background: -moz-linear-gradient(top, #05CEDC, #059DA7);
      // // 兼容IE 10
      // background: -ms-linear-gradient(top, #05CEDC, #059DA7); 
      background: -ms-linear-gradient(top, #05CEDC, #059DA7); 
      background: -webkit-gradient(linear, left top, left bottom, from(#05CEDC), to(#059DA7));
  
      .tag{
        margin: 0 40px;
      }
      .side{
        position: absolute;
        right: 0;
        color: #E8E8E8;
        height: 40px;
        line-height: 40px;
        font-size: 13px;

        .interval{
          margin: 0 40px;
        }
      }
      .textbut{
        color: #FFFFFF;
      }
    }
    .dataList{
      .item{
        display: block;
        height: 50px;
        border: 1px solid #F2F6FC;
        line-height: 50px;
        position: relative;

        .title{
          font-size: 16px;
          display: inline-block;
          width: 600px;
          padding-left: 20px;
          cursor: pointer;
        }
        .dataside{
          position: absolute;
          right: 0;

          .promulgator{
            width: 250px;
            display: inline-block;
            text-align: center;
          }
          .readnum{
            width: 120px;
            display: inline-block;
            text-align: center;
            margin-right: 10px;
          }
          .date{
            width: 108px;
            display: inline-block;
            text-align: center;
          }
        }
      }
      .item:hover{
        background-color: #D0E9FE;
      }
    }
    .page{
      margin-top: 20px;
      display: flex;

      .pagination{
        margin-left: 680px;
      }
    }
  }
</style>
