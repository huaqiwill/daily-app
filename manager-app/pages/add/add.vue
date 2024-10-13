<template>
	<view class="container">
		<view>name:{{userData.name}}</view>
		<view>age:{{userData.age}}</view>
		<button @click="getData">getData</button>

		<van-button type="primary" @click="goToFriendsPage()" block>关系管理</van-button>
		<van-button type="primary" @click="goToBillPage()" block>账单管理</van-button>
		<van-button type="primary" @click="goToNotesPage()" block>笔记管理</van-button>
		<van-button type="primary" block>待办管理</van-button>
		<van-button type="primary" @click="goToBirthManagerPage()" block>生日管理</van-button>
		<van-button type="primary" @click="goToBirthManagerPage()" block>添加生日</van-button>
		<van-button type="primary" @click="goToBirthManagerPage()" block>编辑生日</van-button>
		<van-button type="primary" @click="goToBirthManagerPage()" block>生日详情</van-button>
		<van-button type="primary" @click="goToProfilePage()" block>我的账户</van-button>
		<van-button type="primary" @click="goToProfilePage()" block>账户编辑</van-button>
		<van-button type="primary" @click="goToLoginPage()" block>登录</van-button>
		<van-button type="primary" @click="goToRegisterPage()" block>注册</van-button>
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
			}
		}
	}
</script>

<style>
	.van-button {
		margin-top: 10rpx;
	}
</style>