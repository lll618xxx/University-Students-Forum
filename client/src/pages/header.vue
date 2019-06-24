<template>
  <header id="header">
    <div class="center">
      <h1 class="title" @click="toPage('home')">大学生论坛</h1>
      <el-select v-model="value9" multiple filterable remote reserve-keyword placeholder="请输入关键词搜索" :remote-method="remoteMethod" :loading="loading">
        <el-option v-for="item in options4" :key="item.value" :label="item.label" :value="item.value">
        </el-option>
      </el-select>

      <div class="navMenu">
         <el-dropdown v-if="hasLogin" :show-timeout="50">
          <span class="el-dropdown-link menuBar" @click="toPage('user')">
            <img :src="userheadimg" class="headImg" v-if="userheadimg">
            <img src="../images/default_headimg.png" class="headImg" v-else/>
            {{nickname}}
          </span>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item @click.native="toPage('user')">个人中心</el-dropdown-item>
            <el-dropdown-item @click.native="logout()">退出登录</el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>
        <div v-else @click="toPage('login')" class="notLogin"> 
          <a class="a-link"><i class="iconfont icon-geren2 icon"></i>立即登录</a>
        </div>
      </div>
    </div>
    <!-- 绿色分割线 -->
    <div class="divisions"></div>
    <!-- 退出登录确认框 -->
    <el-dialog title="温馨提示" :visible.sync="dialogVisible" width="30%" :append-to-body="true" :lock-scroll="false">
      <span>确定要退出吗?</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="logoutConfirm()">确 定</el-button>
      </span>
    </el-dialog>
  </header>
</template>

<script>
    
  export default{
    props:['routerNumber'],
    data(){
      return{
        activeIndex: 'home',
        hasLogin: false,
        dialogVisible: false,
        nickname: '',
        userheadimg: '',

        options4: [],
        value9: [],
        list: [],
        loading: false,
        states: ["Alabama", "Alaska", "Arizona",
        "Arkansas", "California", "Colorado",
        "Connecticut", "Delaware", "Florida",
        "Georgia", "Hawaii", "Idaho", "Illinois",
        "Indiana", "Iowa", "Kansas", "Kentucky",
        "Louisiana", "Maine", "Maryland",
        "Massachusetts", "Michigan", "Minnesota",
        "Mississippi", "Missouri", "Montana",
        "Nebraska", "Nevada", "New Hampshire",
        "New Jersey", "New Mexico", "New York",
        "North Carolina", "North Dakota", "Ohio",
        "Oklahoma", "Oregon", "Pennsylvania",
        "Rhode Island", "South Carolina",
        "South Dakota", "Tennessee", "Texas",
        "Utah", "Vermont", "Virginia",
        "Washington", "West Virginia", "Wisconsin",
        "Wyoming"]
      } 
    },
    mounted() {
      this.list = this.states.map(item => {
        return { value: item, label: item }
      })

      // if(this.$store.state.user.token){
      //   this.hasLogin = true
      //   this.$store.dispatch('GetUserInfo').then(() => {
      //     let userinfo = this.$store.state.user.userinfo
      //     this.nickname = userinfo.nickname
      //     this.userheadimg = userinfo.headimgurl
      //   })
      // }
      this.getUserInfo()
    },
    updated(){

    },
    computed: {
     
    },
    methods: {
      getUserInfo(){
        let userinfo = this.$store.state.user.userinfo
        if (userinfo.nickname){
          this.hasLogin = true
          this.nickname = userinfo.nickname
          this.userheadimg = userinfo.headimgurl
        }
        else{
          if (this.$store.state.user.token) {
            this.hasLogin = true
            this.$store.dispatch('GetUserInfo').then(() => {
              let userinfo = this.$store.state.user.userinfo
              this.nickname = userinfo.nickname
              this.userheadimg = userinfo.headimgurl
            })
          }
        }
      },
      remoteMethod(query) {
        if (query !== '') {
          this.loading = true;
          setTimeout(() => {
            this.loading = false;
            this.options4 = this.list.filter(item => {
              return item.label.toLowerCase()
                .indexOf(query.toLowerCase()) > -1;
            });
          }, 200);
        } else {
          this.options4 = [];
        }

      },
      logout(){
        this.dialogVisible = true
      },
      logoutConfirm(){
        this.$store.dispatch('LogOut')
        this.hasLogin = false
        this.dialogVisible = false
      },
      toPage(address){
       
        if (this.routerNumber === 2) {
          this.$router.push(`../${address}`)
          return
        }
        this.$router.push(address)
      },
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
  #header{
    width: 100%;
    min-width: 1263px;
    height: 60px;
    background: #FFFFFF;
    position: fixed;
    z-index: 3;

    .center{
      width: 1263px;
      margin: 0 auto;
      display: flex;
      position: relative;

      .title{
        width: 250px;
        height: 60px;
        text-indent: -9999px;
        background:url("../images/logo.png");
        background-size:250px 60px;
        background-repeat:no-repeat; 
        cursor: pointer;
      }

      .navMenu{
        position: absolute;
        right: 0px;
        top: 0px;
        height: 60px;
        
        .menuBar{
          display: flex;
          line-height: 60px;
          cursor: pointer;
        }
        .icon{
          font-size: 28px;
          margin-right: 8px;
          color: #D6ECE2;
        }
        .headImg{
          width: 34px;
          height: 34px;
          border-radius: 50%;
          margin: 12px 10px 0 0;
        }
        .notLogin{
          cursor: pointer;
          height: 60px;
          line-height: 60px;
      
          .a-link{
            display: flex;
            padding: 0 10px;
          }
          .a-link:hover{
            background-color: #F0F0F0;
            color: #A0A0A0;
          }
        }
      }
    }
    .divisions{
      width: 100%;
      min-width: 1263px;
      margin-top: 1px;
      outline-style: inset;
      outline-color: #D8F918;
      outline-width: 2px;
    } 
  }
  .el-select{
    margin-left: 100px;
    width: 400px;
    top: 10px;
    line-height: 30px;
    border: none;
  }
  .el-select .el-input__inner{
    cursor: text;
  }
  .el-menu--horizontal>.el-menu-item{
    height: 56px;
    line-height: 56px;
  }
  .el-select .el-input .el-select__caret{
    cursor: text;
  }
  .el-select__tags{
    top: 21px;
  }
</style>
