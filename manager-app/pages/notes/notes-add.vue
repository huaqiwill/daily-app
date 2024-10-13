<template>
	<view class="container">
		<van-form @submit="onSubmit">
			<van-field v-model="title" label="标题" placeholder="请输入标题" required />
			<van-field v-model="content" label="内容" placeholder="请输入内容" type="textarea" rows="6" required />
			<van-button type="primary" block round native-type="submit">保存笔记</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				title: '',
				content: ''
			};
		},
		methods: {
			onSubmit() {
				if (this.title === '' || this.content === '') {
					uni.showToast({
						title: '请填写完整内容',
						icon: 'none'
					});
					return;
				}
				// 模拟保存笔记逻辑
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