<template>
  <div>
    <my-header style="position: static"></my-header>
    <div class="learn_container">
      <mainframe v-bind:cgid="cgid"></mainframe>
     <!--  <div class="page">
         <el-button type="primary" @click="publishArticle()">发表文章</el-button>
         <pagination class="pagination"></pagination>
      </div> -->
    </div>
    <my-footer></my-footer>
  </div>
</template>

<script>
  import myHeader from '../header'
  import mainframe from '../common/mainframe.vue'
  import pagination from '../common/pagination.vue'
  import myFooter from '../footer'

  export default{
    components:{myHeader, mainframe, pagination, myFooter},
    data(){
      return{
        cgid: 1
      } 
    },
    mounted(){
      // this.$HttpService.getArticleList({cgid: 1, field: 'time', sort: 'desc'}).then(res => {
      //   this.learnAtricleList = res.data.data
      // })
    },
    methods:{
      publishArticle(){
        this.$router.push('user/publish')
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .learn_container{
    // width: 1200px;
    // margin: 20px auto;

    .page{
      margin-top: 20px;
      display: flex;

      .pagination{
        margin-left: 680px;
      }
    }
  }
</style>
