<template>
  <footer id="foot">
    <div class="top">
      <div class="footlblock left">
        <h2>合作伙伴</h2>
        <hr/>
        <ul>
          <li>民生大学生论坛</li>
          <li>笑看风云论坛</li>
          <li>中国大学生在线网</li>
          <li>广东青年之声</li>
        </ul>
      </div>
      <div class="footlblock">
        <h2>论坛FAQ</h2>
        <hr/>
        <ul>
          <li>商务合作签订方式？</li>
          <li>怎么可以在论坛上发帖子？</li>
          <li>相对的规则是怎么制定的？</li>
          <li>这个论坛有什么特点？</li>
          <li>帖子有哪些种类？</li>
        </ul>
      </div>
      <div class="footlblock right">
        <h2>联系方式</h2>
        <hr/>
        <ul>
          <li>邮件：904799109@qq.ocm</li>
          <li>电话：123456789</li>
          <li>地址：广东皇家学府</li>
        </ul>
      </div>
    </div>
    <div class="bottom">Copyright ©大学生论坛 粤ICP备18032283号-1| 经营许可证 :L-YC-BK34521 </div>
  </footer>
</template>

<script>
    
  export default{
    data(){
      return{
       
      } 
    },
    methods:{
      
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
   #foot{
  height: 360px;
  background-color:#222; 
  width: 100%;
  min-width: 1263px; 
  clear: both;
  margin-top: 40px;
}

#foot .top{
  height: 281px;
  margin: 0 auto;
  text-align: center;
}

#foot .footlblock{
  width: 410px;
  height: 280px;
  display: inline-block;
  text-align: left;
  color: #ccc;
  vertical-align: top;
}

#foot h2{
  font-size: 24px;
  font-weight: normal;
  padding: 20px 0 0 20px;
}

#foot hr{
  width: 88%;
}

#foot ul{
  font-size: 18px;
  color: #777;
  text-indent:60px;
  text-indent:60px;
  line-height: 2;
}

#foot .bottom{
  height: 80px;
  background-color: #000;
  line-height: 80px;
  text-align: center;
  color: #777;
  border-top: 1px solid #444;
}
li{
  line-height: 44px;
}
</style>
