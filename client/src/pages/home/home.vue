<template>
  <div>
    <my-header></my-header>
    <div class="container">
      <home-menu v-bind:cgids="cgid"></home-menu>
      <div class="center">
        <div class="hotNews">
          <carousel></carousel>
          <hot style="margin-left: 15px;"></hot>
          <notice style="margin-left: 15px;"></notice>
          <rank style="margin-left: 20px;"></rank>
        </div>
      </div>
      <my-footer></my-footer>
    </div>
  </div>
</template>

<script>
  import myHeader from '../header'
  import myFooter from '../footer'
  import homeMenu from './homeMenu'
  import carousel from '../information/carousel'
  import hot from '../information/hot'
  import notice from '../information/notice'
  import rank from '../information/rank'

  export default{
    components:{myHeader, myFooter, homeMenu, carousel, hot, notice, rank},
    data(){
      return{
        cgid: 0
      } 
    },
    mounted(){
     
    },
    methods:{
      
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .container{
    position: absolute;
    top: 65px;
    width: 100%;

    .center{
      width: 1263px;
      margin: 10px auto;

      .hotNews{
        display: flex;
        // border: 1px solid black;
      }
    }
  }
  
</style>
