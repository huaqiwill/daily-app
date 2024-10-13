<template>
	<view class="container">
		<van-form @submit="onSubmit">
			<van-field v-model="title" label="标题" placeholder="请输入标题" required />
			<van-field v-model="content" label="内容" placeholder="请输入内容" type="textarea" rows="6" required />
			<van-button type="primary" block round native-type="submit">更新笔记</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				title: '',
				content: '',
				id: null
			};
		},
		onLoad(options) {
			// 模拟获取笔记详情
			const note = {
				id: options.id,
				title: '示例标题',
				content: '示例内容'
			};
			this.title = note.title;
			this.content = note.content;
			this.id = note.id;
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
				// 模拟更新笔记逻辑
				uni.showToast({
					title: '更新成功',
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