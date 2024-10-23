<template>
	<view class="container">
		<view class="cover-bg">
			<image class="cover-pic" src="../../static/banner/1.png" mode=""></image>
		</view>
		<view class="user-info">
			<view class="avatar-box">
				<image class="avatar-pic" src="../../static/pj-logo.png" mode=""></image>
			</view>
			<view class="info">
				<view class="info-item"><text>名字</text><text v-if="!userInfo.edit">{{userInfo.username}}</text><u-input
						v-else v-model="userInfo.username"></u-input><u-icon @click="editUserInfo()"
						:name="userInfo.edit? 'lock':'edit-pen'"></u-icon></view>
				<view class="info-item"><text>简介</text><text
						v-if="!userInfo.edit">{{userInfo.introductory}}</text><u-input v-else
						v-model="userInfo.introductory"></u-input><u-icon @click="editUserInfo()"
						:name="userInfo.edit? 'lock':'edit-pen'"></u-icon></view>
				<view class="info-item"><text>性别</text><text v-if="!userInfo.edit">{{userInfo.gender}}</text><u-input v-else
						v-model="userInfo.gender"></u-input><u-icon @click="editUserInfo()"
						:name="userInfo.edit? 'lock':'edit-pen'"></u-icon></view>
				<view class="info-item"><text>生日</text><text v-if="!userInfo.edit">{{userInfo.birthday}}</text><u-input v-else
						v-model="userInfo.birthday"></u-input><u-icon @click="editUserInfo()"
						:name="userInfo.edit? 'lock':'edit-pen'"></u-icon></view>
				<view class="info-item"><text>所在地</text><text v-if="!userInfo.edit">{{userInfo.address}}</text><u-input v-else
						v-model="userInfo.address"></u-input><u-icon @click="editUserInfo()"
						:name="userInfo.edit? 'lock':'edit-pen'"></u-icon></view>
				<view class="info-item"><text>学校</text><text v-if="!userInfo.edit">{{userInfo.school}}</text><u-input v-else
						v-model="userInfo.school"></u-input><u-icon @click="editUserInfo()"
						:name="userInfo.edit? 'lock':'edit-pen'"></u-icon></view>
				<view class="info-item"><text>Id</text><text v-if="!userInfo.edit">{{userInfo.Id}}</text><u-input v-else
						v-model="userInfo.Id"></u-input><u-icon @click="editUserInfo()"
						:name="userInfo.edit? 'lock':'edit-pen'"></u-icon></view>
			</view>

			<button class="save-edit" @click="saveEdit()">{{ userInfo.edit?"保存":"编辑"}}</button>
		</view>
		<u-toast ref="uToast"></u-toast>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				userInfo: {
					username: "张三",
					introductory: "介绍",
					gender: "性别",
					birthday: "1990-01-01",
					address: "hubei",
					school: "whdx",
					Id: "123",
					edit: false
				}
			};
		},
		methods: {
			saveEdit() {
				// this.$refs.uToast.show({
				// 	message: "保存成功",
				// 	type: "success"
				// })
				this.userInfo.edit = !this.userInfo.edit
				// setTimeout(() => {
				// 	uni.switchTab({
				// 		url: "/pages/profile/profile"
				// 	})
				// }, 1000)
			},
			editUserInfo() {
				this.userInfo.edit = !this.userInfo.edit
			}
		}
	};
</script>
<style scoped>
	.container {
		padding: 30rpx 0;
		background-color: #f5f5f5;
		/* 设置背景颜色 */
		height: 100%;
		/* 确保填充整个页面 */
		min-height: 100vh;
		/* 确保在小屏幕设备上依然填充整个页面 */
	}

	.cover-bg {
		width: 100%;
		height: 400rpx;
		background-color: red;
		overflow: hidden;
	}

	.cover-bg .cover-pic {
		width: 100%;
		background-size: cover;
	}

	.user-info {
		display: flex;
		flex-direction: column;
		align-items: center;
		position: relative;
		width: 100%;
		/* height: 1100rpx; */
		max-height: max-content;
		background: #f5f5f5;
		top: -50rpx;
		border-radius: 20rpx;

	}

	.avatar-box {
		position: absolute;
		top: -100rpx;
		width: 200rpx;
		height: 200rpx;
		background-color: rgba(0, 0, 0);
		border-radius: 50%;
		overflow: hidden;
	}

	.avatar-pic {
		width: 200rpx;
		height: 200rpx;
	}

	.info {
		width: 100%;
		margin-top: 200rpx;
		/* background-color: red; */
	}

	.info .info-item {
		display: flex;
		align-items: center;
		margin-bottom: 20rpx;
		/* background-color: red; */
		height: 100rpx;
	}

	.info .info-item text:nth-child(1) {
		width: 200rpx;
		margin-left: 80rpx;
	}

	.info .info-item text:nth-child(2) {
		margin-left: 20rpx;
	}

	.save-edit {
		width: 50%;
		height: 80rpx;
		line-height: 80rpx;
		font-size: 30rpx;
		/* #ifdef APP-PLUS */
		margin-bottom: 30rpx;
		/* #endif */
	}
</style>