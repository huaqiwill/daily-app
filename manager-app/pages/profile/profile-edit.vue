<template>
	<view class="container">
		<view class="header">
			<text class="title">编辑个人资料</text>
		</view>

		<view class="form">
			<view class="form-item">
				<text>姓名:</text>
				<input v-model="userInfo.name" placeholder="请输入姓名" />
			</view>
			<view class="form-item">
				<text>邮箱:</text>
				<input v-model="userInfo.email" placeholder="请输入邮箱" />
			</view>
			<view class="form-item">
				<text>电话:</text>
				<input v-model="userInfo.phone" placeholder="请输入电话" />
			</view>
			<view class="form-item">
				<text>生日:</text>
				<input v-model="userInfo.birthday" type="date" placeholder="选择生日" />
			</view>
		</view>

		<button class="save-button" @click="saveProfile">保存</button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				userInfo: {
					name: '',
					email: '',
					phone: '',
					birthday: ''
				}
			};
		},
		methods: {
			saveProfile() {
				// 保存用户信息的逻辑
				uni.showToast({
					title: '信息已保存',
					icon: 'success'
				});
				uni.navigateBack(); // 返回上一页
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
	}

	.header {
		margin-bottom: 20px;
	}

	.title {
		font-size: 24px;
		font-weight: bold;
	}

	.form {
		background-color: white;
		padding: 15px;
		border-radius: 5px;
	}

	.form-item {
		margin-bottom: 15px;
	}

	.save-button {
		width: 100%;
		padding: 10px;
		background-color: #007aff;
		color: white;
		border: none;
		border-radius: 5px;
	}
</style>