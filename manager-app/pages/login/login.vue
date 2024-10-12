<template>
	<view class="container">
		<!-- 登录表单 -->
		<view class="form">
			<!-- 用户名输入框 -->
			<input v-model="form.username" type="text" placeholder="请输入用户名" class="input" />

			<!-- 密码输入框 -->
			<input v-model="form.password" type="password" placeholder="请输入密码" class="input" />

			<!-- 登录按钮 -->
			<button class="btn" @click="login">登录</button>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				form: {
					username: '',
					password: ''
				}
			};
		},
		methods: {
			login() {
				// 简单的表单验证
				if (!this.form.username) {
					return uni.showToast({
						title: '请输入用户名',
						icon: 'none'
					});
				}
				if (!this.form.password) {
					return uni.showToast({
						title: '请输入密码',
						icon: 'none'
					});
				}

				// 模拟登录请求
				uni.showLoading({
					title: '正在登录...'
				});

				// 模拟登录请求，替换为实际的请求
				setTimeout(() => {
					uni.hideLoading();
					if (this.form.username === 'admin' && this.form.password === '123456') {
						uni.showToast({
							title: '登录成功',
							icon: 'success'
						});

						// 跳转到首页（或其他页面）
						uni.switchTab({
							url: '/pages/index/index' // 修改为实际首页路径
						});
					} else {
						uni.showToast({
							title: '用户名或密码错误',
							icon: 'none'
						});
					}
				}, 1000);
			}
		}
	};
</script>

<style scoped>
	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		background-color: #f7f7f7;
	}

	.form {
		width: 80%;
		background-color: #fff;
		padding: 20px;
		border-radius: 10px;
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
	}

	.input {
		width: 100%;
		height: 45px;
		margin-bottom: 20px;
		padding: 0 15px;
		border: 1px solid #ddd;
		border-radius: 5px;
		font-size: 16px;
	}

	.btn {
		width: 100%;
		height: 45px;
		background-color: #007aff;
		color: #fff;
		border: none;
		border-radius: 5px;
		font-size: 16px;
		text-align: center;
		line-height: 45px;
	}
</style>