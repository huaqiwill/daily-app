import App from './App'

// #ifndef VUE3
import Vue from 'vue'
import './uni.promisify.adaptor'
Vue.config.productionTip = false
App.mpType = 'app'
const app = new Vue({
	...App
})
app.$mount()
// #endif

// #ifdef VUE3
import {
	createSSRApp
} from 'vue'

// bootstrap4
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.min.js';

// vant
import 'vant/lib/index.css'; // 引入 Vant 样式
import Vant from 'vant'; // 引入 Vant 组件库




export function createApp() {
	const app = createSSRApp(App)

	app.use(Vant); // 全局注册 Vant 组件

	return {
		app
	}
}
// #endif