import axios from './AxiosConfig'
import qs from 'qs'
import { getToken } from '@/utils/cookies/cookies'

class ServerBase{
	constructor(){
      
		this.__init()
	}

	/**
     * __init
     */
    __init() {
       
        this.__initMethods()
    }

    __initMethods(){
    	// this.__initGetRequest()
    	
    }

    getRequest(url='',params=''){
    	return axios({
    		method: 'get',
			url: url,
			params: params,
			headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
               'Author': getToken() || ''
            }
    	})
    }

    deleteRequest(url='',params=''){
        return axios({
            method: 'delete',
            url: url,
            params: params,
            headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
               'Author': getToken() || ''
            }
        })
    }

    postRequest(url='',data=''){
    	return axios({
    		method: 'post',
			url: url,
			data: qs.stringify(data),
			headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
               'Author': getToken() || ''
            }
    	})
    }

    putRequest(url='',data=''){
        return axios({
            method: 'put',
            url: url,
            data: qs.stringify(data),
            headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
               'Author': getToken() || ''
            }
        })
    }

}

export default ServerBase