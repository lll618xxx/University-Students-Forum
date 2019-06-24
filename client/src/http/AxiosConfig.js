import axios from 'axios'
import path from './PathConfig'
import {getToken} from '@/utils/cookies/cookies'

//全局的 axios 默认值

//响应时间
axios.defaults.timeout = 10000; 
//配置请求头
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8'; 
axios.defaults.headers.common['Author'] = getToken() || ''   
//配置接口地址
axios.defaults.baseURL = path.basePath;   

// 用axios发送post请求去登录，能成功返回数据，但是用作权限验证的cookie就是没有保存,
// 经查阅，axios 默认不发送cookie，跨域也是一个原因，需要全局设置
// axios.defaults.withCredentials = true

// 添加请求拦截器
axios.interceptors.request.use(function (config) {
    // 在发送请求之前做些什么
   
    return config;
  }, function (error) {
    // 对请求错误做些什么
    return Promise.reject(error);
  });

// 添加响应拦截器
axios.interceptors.response.use(function (response) {
    // 对响应数据做点什么
   
    return response;
  }, function (error) {
    // 对响应错误做点什么
    return Promise.reject(error);
  });


export default axios