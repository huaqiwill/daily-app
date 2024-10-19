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
			<view :class="item.name" v-for="(item,index) of tools" :key="item.id">
				<u-icon :size="item.icon_size" class="icon-map" :name="item.type"></u-icon>
				{{item.title}}
			</view>
			<!-- <view class="relation">
				<u-icon :size="30" class="icon-map" name="map"></u-icon>
				关系管理
			</view>
			<view class="birth">
				<u-icon :size="30" class="icon-map" name="map"></u-icon>
				生日管理
			</view>
			<view class="everyday">
				<u-icon :size="30" class="icon-map" name="map"></u-icon>
				日常管理
			</view>
			<view class="note">
				<u-icon :size="30" class="icon-map" name="map"></u-icon>
				笔记管理
			</view>
			<view class="bill">
				<u-icon :size="30" class="icon-map" name="map"></u-icon>
				账单管理
			</view>
			<view class="backlog">
				<u-icon :size="30" class="icon-map" name="map"></u-icon>
				待办管理
			</view> -->
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
				title: "hello",
				tools: [{
						id: 1,
						name: "relation",
						type: "map",
						title: "关系管理",
						icon_size: 30
					},
					{
						id: 2,
						name: "birth",
						type: "map",
						title: "生日管理",
						icon_size: 30
					},
					{
						id: 3,
						name: "everyday",
						type: "map",
						title: "日常管理",
						icon_size: 30
					},
					{
						id: 4,
						name: "note",
						type: "map",
						title: "笔记管理",
						icon_size: 30
					},
					{
						id: 5,
						name: "bill",
						type: "map",
						title: "账单管理",
						icon_size: 30
					},
					{
						id: 6,
						name: "backlog",
						type: "map",
						title: "关系管理",
						icon_size: 30
					}
				]
			}
		},
		methods: {
			goToSetting() {
				this.$refs.uToast.show({
					message: "setting"
				})
				uni.navigateTo({
					url: "/pages/profile/profile-edit"
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