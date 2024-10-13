<template>
	<view class="container">

		<view class="logo">
			<image src="../../static/pj-logo.png" mode=""></image>
		</view>
		<!-- 注册表单 -->
		<van-form @submit="register()" class="register_form">
			<van-cell-group inset>
				<van-field v-model="form.username" name="用户名" label="用户名" placeholder="用户名"
					:rules="[{ required: true, message: '请填写用户名' }]" />
				<van-field v-model="form.password" type="password" name="密码" label="密码" placeholder="密码"
					:rules="[{ required: true, message: '请填写密码' }]" />
			</van-cell-group>
			<div style="margin: 16px;">
				<van-button @click="register()" round block type="primary" native-type="submit">
					用户注册
				</van-button>
				<text class="text-register-info">已有账号？去<text class="link-register"
						@click="goToLogin()">登录</text>。</text>
			</div>
		</van-form>
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
			goToLogin(){
				uni.navigateTo({
					url:"/pages/login/login"
				})
			},
			register() {
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

				// 模拟注册请求
				uni.showLoading({
					title: '正在注册...'
				});

				// 模拟注册请求，替换为实际的请求
				setTimeout(() => {
					uni.hideLoading();
					if (this.form.username === 'admin' && this.form.password === '123456') {
						uni.showToast({
							title: '注册成功',
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
		},
	};
</script>

<style scoped>
	.container {
		height: calc(100vh - 90rpx);
		/* 根据需要调整减去的像素值 */
		background-color: aliceblue;
		overflow: hidden;
		/* 禁止溢出时出现滚动条 */
		padding: 100rpx 20rpx;
	}

	.logo {
		text-align: center;
	}

	.logo image {
		width: 200rpx;
		height: 200rpx;
	}

	.register_form {}
	
	.text-register-info{
		font-size: 28rpx;
	}
	.link-register{
		color: #1989fa;
	}
</style>