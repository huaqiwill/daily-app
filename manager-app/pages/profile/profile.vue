<template>
	<view class="container">
		<view class="profile-header">
			<text class="profile-title">个人资料</text>
		</view>

		<view class="profile-info">

			<view class="info-item">
				<van-cell-group inset style="display: flex;height:200rpx;">
					<van-field style="width: 120rpx;" label="头像:" readonly />
					<image src="../../static/logo.png" mode="" class="avatar"></image>
				</van-cell-group>
			</view>

			<view class="info-item">
				<van-cell-group inset>
					<van-field label="姓名:" v-model="userInfo.name" readonly />
				</van-cell-group>
			</view>
			<view class="info-item">
				<van-cell-group inset>
					<van-field label="邮箱:" v-model="userInfo.email" readonly />
				</van-cell-group>
			</view>
			<view class="info-item">
				<van-cell-group inset>
					<van-field label="电话:" v-model="userInfo.phone" readonly />
				</van-cell-group>
			</view>
			<view class="info-item">
				<van-cell-group inset>
					<van-field label="生日:" v-model="userInfo.birthday" readonly />
				</van-cell-group>
			</view>
		</view>

		<van-button class="btn btn-edit" type="primary" size="large" @click="editProfile">编辑</van-button>
		<view class="footer">
			<van-button class="btn btn-logout" type="primary" size="large" @click="logout">退出登录</van-button>
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
				uni.switchTab({
					url:"/pages/index/index"
				})
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 0 20px;
	}

	.btn {
		margin-top: 10rpx;
	}

	.profile-header {
		padding: 20rpx 0;
	}

	.profile-title {
		font-weight: bold;
		font-size: 40rpx;
	}

	.info-item {
		width: 100%;
		margin-top: 30rpx;
	}

	.avatar {
		width: 200rpx;
		height: 200rpx
	}

	.avatar:hover::before {
		content: "编辑";
		color: white;
		font-size: 16px;
		text-align: center;
		line-height: 200rpx;
		/* 设置与高度一致，使得文字居中 */
	}

	.avatar::before {
		content: "";
		width: 200rpx;
		height: 200rpx;
		background-color: rgba(0, 0, 0, 0.3);
		position: absolute;
		top: 0;
		left: 0;
		display: flex;
		justify-content: center;
		align-items: center;
		opacity: 0;
		transition: opacity 0.3s ease;
		/* 过渡效果 */
	}

	.avatar:hover::before {
		opacity: 1;
		/* 鼠标悬停时，显示伪类 */
	}
</style>