<template>
	<view class="container">
		<view class="logo">
			<image class="logo-pic" src="../../static/pj-logo.png" mode=""></image>
		</view>

		<view class="my-form">
			<text>用户名：</text>
			<input type="text" v-model="userData.username" name="username" id="username" />
			<text>密码：</text>
			<input type="password" v-model="userData.password" name="password" id="password">

			<button @click="userLogin()">登录</button>
			<text>没有账号？去<text class="regster-text" @click="goToRegister()">注册</text>。</text>
		</view>
		<up-toast ref="uToast"></up-toast>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				userData: {
					username: "admin",
					password: "admin"
				}
			}
		},
		methods: {
			
			userLogin() {
				console.log(this.userData.username, this.userData.password);
				if (this.userData.username == "admin" && this.userData.password == "admin") {
					uni.switchTab({
						url: "/pages/index/index",
						success: function() {
							console.log('跳转成功');
						},
						fail: function(error) {
							console.log('跳转失败:', error);
						}
					})
				} else {
					this.$refs.uToast.show({
						message: "用户名或密码错误！！！",
						type: "warning"
					})
				}
			},
			// 用户注册
			goToRegister(){
				uni.navigateTo({
					url:"/pages/login/register"
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

	.logo {
		display: flex;
		justify-content: center;
	}

	.logo-pic {
		width: 200rpx;
		height: 200rpx;
	}

	#username,
	#password {
		height: 80rpx;
		border: 1px solid #83a0d1;
		margin-bottom: 30rpx;
		text-indent: 10rpx;
	}

	.regster-text{
		color: #83a0d1;
	}
</style>