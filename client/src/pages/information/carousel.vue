<template>
  <div class="carousel">
    <el-carousel height="300px"> 
      <el-carousel-item v-for="item in carouselImage" :key="item">
        <img :src="item" class="image" />
      </el-carousel-item>
    </el-carousel>
  </div>
</template>

<script>
 
  export default{
   
    data(){
      return{
        carouselImage:['https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=1904243979,2846970459&fm=26&gp=0.jpg',
        'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2875260689,3878145101&fm=26&gp=0.jpg',
          'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=2738056785,349669080&fm=26&gp=0.jpg',
        ]
      } 
    },
    methods:{
      
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  .carousel{
    width: 300px;
    padding: 5px;
    border: 1px solid #C0C0C0;

    .image{
      width: 300px;
      height: 300px;
      cursor: pointer;
    }
  }
</style>
