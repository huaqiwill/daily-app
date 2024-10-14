<template>
	<view class="container">
		<van-form @submit="onSubmit">
			<van-field v-model="title" label="标题" placeholder="请输入标题" required />
			<van-field v-model="description" label="描述" placeholder="请输入描述" required />
			<van-button type="primary" block round native-type="submit">保存待办</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				title: '',
				description: ''
			};
		},
		methods: {
			onSubmit() {
				if (!this.title || !this.description) {
					uni.showToast({
						title: '请填写完整信息',
						icon: 'none'
					});
					return;
				}
				// 模拟保存待办事项
				uni.showToast({
					title: '保存成功',
					icon: 'success'
				});
				setTimeout(() => {
					uni.navigateBack();
				}, 1000);
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
	}
</style>