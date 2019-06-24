<template>
  <div>
    <el-pagination
      background
      layout="prev, pager, next"
      :total="totalPage" @size-change="sizeChange" @prev-click="prevClick" @next-click="nextClick" @current-change="currentChange">
    </el-pagination>
  </div>
</template>

<script>
 	export default{
 		props:['totalPage'],
 		data(){
 			return{
 				
 			}
 		},
 		methods:{
 			sizeChange(val){
 				console.log('sizeChange', val)
 			},
 			prevClick(val){
 				console.log('prevClick', val)
 			},
 			nextClick(val){
 				console.log('nextClick', val)
 			},
 			currentChange(val){
 				this.$parent.getArticleList('', '', val)
 			}
 		}
 	}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
 
</style>
