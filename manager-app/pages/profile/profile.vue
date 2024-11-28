<template>
	<view class="container">

		<!-- 头部 -->
		<view class="profile_top">
			<view class="avatar" @click="goToSetting()">

			</view>
			<view class="user_tip">
				<text>
					<text @click="goToLogin(0)">注册</text>
					/
					<text @click="goToLogin(1)">登录</text>
				</text>
				<text>登录后可体验更多服务</text>
			</view>
		</view>

		<!-- 菜单 -->
		<view class="profile_look">
			<view class="history">
				<text>{{1}}</text>
				<text>浏览历史</text>
			</view>

			<view class="collect">
				<text>{{1}}</text>
				<text>收藏</text>
			</view>

			<view class="current">
				<text>{{1}}</text>
				<text>服务</text>
			</view>
		</view>

		<!-- 菜单 -->
		<view class="profile_tools">
			<view :class="item.name" v-for="(item,index) of tools" :key="item.id">
				<u-icon :size="item.icon_size" class="icon-map" :name="item.type"></u-icon>
				{{item.title}}
			</view>
		</view>

		<view class="other">
			other
		</view>

		<up-toast ref="uToast"></up-toast>
	</view>
</template>
<script setup>
	import {
		ref
	} from 'vue'
	import {
		onLoad
	} from '@dcloudio/uni-app'
	import {
		toolsData
	} from './data.js'

	const title = ref("hello")
	const tools = ref([])

	onLoad(() => {
		tools.value = toolsData
	})

	function goToSetting() {
		uni.showToast({
			title: "setting"
		})
		uni.navigateTo({
			url: "/pages/profile/profile-edit"
		})
	}

	function goToLogin(index) {
		if (index == 1) {
			uni.navigateTo({
				url: "/pages/login/login"
			})
		} else {
			uni.navigateTo({
				url: "/pages/login/register"
			})
		}
	}
</script>
<style scoped>
	.container {
		padding: 30rpx 30rpx;
		background-color: #f5f5f5;
		/* 设置背景颜色 */
		height: 100%;
		/* 确保填充整个页面 */
		min-height: 100vh;
		/* 确保在小屏幕设备上依然填充整个页面 */
	}

	.profile_top {
		display: flex;
		align-items: center;
	}

	.avatar {
		width: 150rpx;
		height: 150rpx;
		background-color: darkgray;
		border-radius: 50%;
	}

	.user_tip {
		display: flex;
		flex-direction: column;
		margin-left: 20rpx;
	}

	.user_tip text:first-child {
		font-size: 40rpx;
		font-weight: bold;

	}

	.profile_look {
		width: 100%;
		height: 170rpx;
		border-radius: 40rpx;
		background-color: #fff;
		margin-top: 80rpx;

		display: flex;
		justify-content: space-evenly;
		align-items: center;

	}

	.history,
	.collect,
	.current {
		display: flex;
		flex-direction: column;
		text-align: center;
	}

	.profile_tools {
		width: 100%;
		height: 500rpx;
		background-color: #fff;
		border-radius: 40rpx;
		margin-top: 40rpx;
		display: flex;
		flex-wrap: wrap;
		justify-content: start;
		align-items: center;
	}

	.relation,
	.backlog,
	.bill,
	.birth,
	.everyday,
	.note {
		margin: 0 20rpx 0 20rpx;
		/* margin-right: 40rpx; */
	}

	.other {
		width: 100%;
		height: 200rpx;
		background-color: #fff;
		border-radius: 40rpx;
		margin-top: 40rpx;
		font-size: 40rpx;
		font-weight: bold;
		text-align: center;
		line-height: 200rpx;
	}

	.setting {
		margin-top: -100rpx;
		margin-left: 18%;
	}

	.icon-map {
		display: flex;
		justify-content: center;
		/* margin-bottom: 10rpx; */
		/* background-color: red; */
	}
</style>