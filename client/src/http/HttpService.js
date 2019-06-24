import ServerBase from './ServerBase'

class HttpService extends ServerBase{
	constructor(){
		super()
		this.$$prefix = ''
        this.$$path = {
            message: '/Api/User',
            register: '/Api/User/register',
            login: '/Api/User/login',
            userInfo: '/Api/User/userInfo',
            nickNameCheck: '/Api/User/nickNameCheck',
            getArticle: '/Api/Info/getArticle',
            postArticle: '/Api/Info/postArticle',
            getArticleList: '/Api/Info/getArticleList',
            

            deletetest: '/Api/User/deleteTest',
            puttest: '/Api/User/putTest',
        }
	}

    // getRequest
	getMessage(params){return this.getRequest(this.$$path.message, params)}
    getUserInfo(params){return this.getRequest(this.$$path.userInfo, params)}
    getArticle(params){return this.getRequest(this.$$path.getArticle, params)}
    getArticleList(params){return this.getRequest(this.$$path.getArticleList, params)}

    // postRequest
    register(params){return this.postRequest(this.$$path.register, params)}
    login(params){return this.postRequest(this.$$path.login, params)}
    postArticle(params){return this.postRequest(this.$$path.postArticle, params)}
    nickNameCheck(params){return this.postRequest(this.$$path.nickNameCheck, params)}

    //putRequest
    putUserInfo(params){return this.putRequest(this.$$path.userInfo, params)}
    
    deleteTest(params){
    	return this.deleteRequest(this.$$path.deletetest, params)
    }
    putTest(params){
    	return this.deleteRequest(this.$$path.puttest, params)
    }
}

const $HttpService = new HttpService;

export default $HttpService