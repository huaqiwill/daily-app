import axios from "axios"


// #ifdef MP
import {
	wxAdapter
} from './wxAdapter.js'
axios.defaults.adapter = wxAdapter;
// #endif


const requests = axios.create({
	baseURL: "http://localhost:8000/api",
	timeout: 5000
})


// 请求拦截器
requests.interceptors.request.use((config) => {
	const authentication = "test"
	config.headers = {
		authentication
	}
	return config;
}, (err) => {
	return Promise.reject(err)
})

// 响应拦截器
requests.interceptors.response.use((response) => {

	// 直接返回json数据
	if (response.data?.code == 200) {
		uni.showToast({
			title: response.data.message ?? "请求成功"
		})
		return Promise.resolve(response.data)
	} else {
		uni.showToast({
			title: response.data.message
		})
		return Promise.reject(response.data)
	}

}, (err) => {
	return Promise.reject(err)
})

export default requests