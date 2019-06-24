import * as qiniu from 'qiniu-js'

export function upload(file="", token=""){
	// file: Blob 对象，上传的文件    
	// key: 文件资源名
	// token: 上传验证信息，前端通过接口请求后端获得 
	let key = Date.parse(new Date()).toString()

	const config = {
	  	useCdnDomain: false,     // 表示是否使用 cdn 加速域名
	  	region: qiniu.region.z2  // 代表华南区域
	}

	const putExtra = {
	  	fname: "",				// string，文件原文件名
	  	params: {},				// object，用来放置自定义变量
	  	mimeType:  [] || null	// 用来限制上传文件类型，为 null 时表示不对文件类型限制；限制类型放到数组里： ["image/png", "image/jpeg", "image/gif"]
	}

	let observable = qiniu.upload(file, key, token, putExtra, config)

	// 上传开始
	let subscription = observable.subscribe(observable.subscribe({
        next: (res) => {
          console.log(res)
        },
        error: (err) => {
          console.log(err)
        
        },
        complete: (res) => {
          console.log(res)
        }
      })
    ) 

    return key
	// subscription.unsubscribe() // 上传取消
}


