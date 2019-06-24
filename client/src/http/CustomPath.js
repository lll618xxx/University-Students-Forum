import path from './PathConfig'

//实现在element UI 组件中请求自定义路径

let getQiniuToken 		= `${path.basePath}/Api/Tool/getToken`
let qiniuServerUpload 	= `${path.basePath}/Api/Tool/qiniuServerUpload`

export default{
	getQiniuToken,
	qiniuServerUpload
}
