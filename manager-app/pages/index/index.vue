<template>
	<view class="content">

		<view class="seach-box">
			<van-search v-model="kw" shape="round" background="#fff" placeholder="请输入搜索关键词" style="flex: 6;"
				@search="onSearch(kw)"/>
			<view class="user_login" @click="goToLogin()">
				user
			</view>
		</view>

		<swiper circular :indicator-dots="true" :autoplay="true" :interval="3000" :duration="1000"
			style="width: 100%;height: 350rpx;">
			<swiper-item style="background-color: red; text-align: center;">
				<view class="swiper-item">
					<image src="../../static/banner/1.png" style="width: 100%;"></image>
				</view>
			</swiper-item>
			<swiper-item style="background-color: green; text-align: center;">
				<view class="swiper-item">
					<image src="../../static/banner/2.png" style="width: 100%;"></image>
				</view>
			</swiper-item>
		</swiper>
		<view>
			<view class="nav">
				<view class="nav-item-box">
					<view class="nav-item nav_profile">
						<image src="../../static/images/user.png" mode=""></image>
					</view>
					<text>用户</text>
				</view>
				<view class="nav-item-box">
					<view class="nav-item nav_birth">
						<image src="../../static/images/public-relations.png" mode=""></image>
					</view>
					<text>关系</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_friends">
						<image src="../../static/images/notes.png" mode=""></image>
					</view>
					<text>笔记</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_friends">
						<image src="../../static/images/invoice.png" mode=""></image>
					</view>
					<text>bill</text>
				</view>

			</view>
			<view class="nav">
				<view class="nav-item-box">
					<view class="nav-item nav_profile">
						<image src="../../static/images/backlog.png" mode=""></image>
					</view>
					<text>待办</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_birth">
						<image src="../../static/images/megaphone.png" mode=""></image>
					</view>
					<text>bill</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_friends">
						<image src="../../static/images/birth.png" mode=""></image>
					</view>
					<text>生日</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_friends">
						<image src="../../static/images/user.png" mode=""></image>
					</view>
					<text>bill</text>
				</view>

			</view>
			<!-- 			<button class="btn" @click="goToProfile">跳转到个人中心</button>
			<button class="btn" @click="goToBirth">跳转到生日管理</button>
			<button class="btn" @click="gotoFriends">跳转到朋友管理</button>
			<navigator url="/pages/friends/friends">导航到朋友管理</navigator> -->
		</view>
	</view>
</template>

<script>
	import {
		showToast
	} from 'vant';
	import {
		toUrl
	} from '../../utils';
	export default {
		data() {
			return {
				kw: ""
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
			},
			goToLogin() {
				uni.navigateTo({
					url: "/pages/login/login"
				})
			},
			onSearch(val) {
				showToast(val)
			}
		}
	}
</script>

<style>
	.nav {
		width: 100%;
		display: flex;
		justify-content: space-evenly;
		margin-top: 100rpx;
	}

	.nav-item {
		width: 100rpx;
		height: 100rpx;
		/* 	background-color: red; */
		text-align: center;
		line-height: 100rpx;
		border-radius: 20px;
		overflow: hidden;
	}

	.nav-item-box {
		text-align: center;
		font-size: 28rpx;
	}

	.nav-item image {
		width: 100%;
		height: 100%;
		transform: scale(1.3);
		transform-origin: center center;
	}

	.seach-box {
		display: flex;
		padding: 10rpx 10rpx 0 0;
	}

	.user_login {
		flex: 1;
		width: 200rpx;
		height: 100rpx;
		background-color: darkgray;
		color: aliceblue;
		border-radius: 50%;
		text-align: center;
		line-height: 100rpx;
	}
</style>