<template>
	<view class="container">
		<view class="profile-header">
			<text class="profile-title">个人资料</text>
			<button class="edit-button" @click="editProfile">编辑</button>
		</view>

		<view class="profile-info">
			<view class="info-item">
				<text class="info-label">姓名:</text>
				<text class="info-value">{{ userInfo.name }}</text>
			</view>
			<view class="info-item">
				<text class="info-label">邮箱:</text>
				<text class="info-value">{{ userInfo.email }}</text>
			</view>
			<view class="info-item">
				<text class="info-label">电话:</text>
				<text class="info-value">{{ userInfo.phone }}</text>
			</view>
			<view class="info-item">
				<text class="info-label">生日:</text>
				<text class="info-value">{{ userInfo.birthday }}</text>
			</view>
		</view>

		<view class="footer">
			<button class="logout-button" @click="logout">退出登录</button>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				userInfo: {
					name: '张三',
					email: 'zhangsan@example.com',
					phone: '12345678901',
					birthday: '1990-01-01'
				}
			};
		},
		methods: {
			editProfile() {
				uni.navigateTo({
					url: '/pages/profile/profile-edit' // 跳转到编辑页面
				});
			},
			logout() {
				// 处理退出登录逻辑
				uni.showToast({
					title: '已退出登录',
					icon: 'success'
				});
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
		background-color: #f5f5f5;
	}

	.profile-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-bottom: 20px;
	}

	.profile-title {
		font-size: 24px;
		font-weight: bold;
	}

	.edit-button {
		padding: 5px 10px;
		background-color: #007aff;
		color: white;
		border: none;
		border-radius: 5px;
	}

	.profile-info {
		background-color: white;
		padding: 15px;
		border-radius: 5px;
	}

	.info-item {
		display: flex;
		justify-content: space-between;
		margin-bottom: 10px;
	}

	.info-label {
		font-weight: bold;
	}

	.footer {
		margin-top: 20px;
	}

	.logout-button {
		width: 100%;
		padding: 10px;
		background-color: #ff3b30;
		color: white;
		border: none;
		border-radius: 5px;
	}
</style>