<template>
	<view class="container">
		<view class="profile_top">
			<view class="avatar">

			</view>
			<view class="user_tip" @click="goToLogin()">
				<text>注册/登录</text>
				<text>登录后可体验更多服务</text>
			</view>
			<view class="setting" @click="goToSetting()">
				<text class="setting-text">设置</text>
			</view>
		</view>

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


		<view class="profile_tools">
			<view class="relation">
				关系管理
			</view>
			<view class="birth">
				生日管理
			</view>
			<view class="everyday">
				日常管理
			</view>
			<view class="note">
				笔记管理
			</view>
			<view class="bill">
				账单管理
			</view>
			<view class="backlog">
				待办管理
			</view>
		</view>

		<view class="other">
			other
		</view>

		<up-toast ref="uToast"></up-toast>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				title: "hello"
			}
		},
		methods: {
			goToSetting() {
				this.$refs.uToast.show({
					message: "setting"
				})
				uni.navigateTo({
					url:"/pages/profile/profile-edit"
				})
			},
			goToLogin() {
				uni.navigateTo({
					url: "/pages/login/login"
				})
			}
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
		margin: 0 20rpx;
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
</style>