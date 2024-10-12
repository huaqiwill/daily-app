<template>
	<view class="content">
		<image class="logo" src="/static/logo.png"></image>
		<view>
			<button class="btn" @click="goToProfile">跳转到个人中心</button>
			<button class="btn" @click="goToBirth">跳转到生日管理</button>
			<button class="btn" @click="gotoFriends">跳转到朋友管理</button>
			<navigator url="/pages/friends/friends">导航到朋友管理</navigator>
		</view>
	</view>
</template>

<script>
	import {
		toUrl
	} from '../../utils';
	export default {
		data() {
			return {
				title: 'Hello'
			}
		},
		onLoad() {

		},
		methods: {
			// 跳转到指定页面
			goToProfile() {
				uni.navigateTo({
					url: '/pages/profile/profile'
				});
			},
			goToBirth() {
				uni.navigateTo({
					url: '/pages/birth/birth'
				});
			},
			gotoFriends() {
				uni.navigateTo({
					url: '/pages/friends/friends'
				});
			}
		}
	}
</script>

<style>
	.content {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}

	.logo {
		height: 200rpx;
		width: 200rpx;
		margin-top: 200rpx;
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 50rpx;
	}

	.text-area {
		display: flex;
		justify-content: center;
	}

	.title {
		font-size: 36rpx;
		color: #8f8f94;
	}
</style>