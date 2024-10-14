<template>
	<view class="container">
		<van-form @submit="onSubmit">
			<van-field v-model="name" label="名称" placeholder="请输入名称" required />
			<van-field v-model="type" label="关系类型" placeholder="请输入关系类型" required />
			<van-button type="primary" block round native-type="submit">保存关系</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				name: '',
				type: ''
			};
		},
		methods: {
			onSubmit() {
				if (!this.name || !this.type) {
					uni.showToast({
						title: '请填写完整信息',
						icon: 'none'
					});
					return;
				}
				// 模拟保存关系信息
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