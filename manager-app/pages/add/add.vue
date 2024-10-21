<template>
	<view class="container">
		<view>name:{{userData.name}}</view>
		<view>age:{{userData.age}}</view>
		<button @click="getData">getData</button>

		<button type="primary" @click="goToFriendsPage()">关系管理</button>
		<button type="primary" @click="goToBillPage()">账单管理</button>
		<button type="primary" @click="goToNotesPage()">笔记管理</button>
		<button type="primary" @click="goTotoDos()">待办管理</button>
		<button type="primary" @click="goToBirthManagerPage()">生日管理</button>
		<button type="primary" @click="goToBirthManagerPage()">添加生日</button>
		<button type="primary" @click="goToBirthManagerPage()">编辑生日</button>
		<button type="primary" @click="goToBirthManagerPage()">生日详情</button>
		<button type="primary" @click="goToProfilePage()">我的账户</button>
		<button type="primary" @click="goToProfilePage()">账户编辑</button>
		<button type="primary" @click="goToLoginPage()">登录</button>
		<button type="primary" @click="goToRegisterPage()">注册</button>
		<button type="primary" @click="goToTabbar()">tabbar</button>
	</view>
</template>
<script>
	import {
		getData
	} from '../../utils/api'
	export default {
		data() {
			return {
				userData: {
					name: "",
					age: null
				}
			}
		},
		onLoad() {

		},
		onReachBottom() {
			console.log("我触底执行了");
		},
		methods: {
			async getData() {
				try {
					const result = await getData()
					this.userData = result
				} catch (e) {
					console.log("错误处理", e);
				}
			},
			goToBillPage() {
				uni.navigateTo({
					url: "/pages/bill/bill"
				})
			},
			goToFriendsPage() {
				uni.navigateTo({
					url: "/pages/friends/friends"
				})
			},
			goToNotesPage() {
				uni.navigateTo({
					url: "/pages/notes/notes"
				})
			},
			goToBirthManagerPage() {
				uni.navigateTo({
					url: "/pages/birth/birth"
				})
			},
			goToProfilePage() {
				uni.switchTab({
					url: "/pages/profile/profile"
				})
			},
			goToLoginPage() {
				uni.navigateTo({
					url: "/pages/login/login"
				})
			},
			goToRegisterPage() {
				uni.navigateTo({
					url: "/pages/login/register"
				})
			},
			goToTabbar() {
				uni.navigateTo({
					url: "/pages/tabbar/tabbar"
				})
			},
			goTotoDos() {
				uni.navigateTo({
					url: "/pages/todos/todos"
				})
			}
		}
	}
</script>

<style>
	.van-button {
		margin-top: 10rpx;
	}
</style>