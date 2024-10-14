<template>
	<view class="container">
		<van-form @submit="onSubmit">
			<van-field v-model="name" label="名称" placeholder="请输入名称" required />
			<van-field v-model="type" label="关系类型" placeholder="请输入关系类型" required />
			<van-button type="primary" block round native-type="submit">更新关系</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				name: '',
				type: '',
				id: null
			};
		},
		onLoad(options) {
			// 模拟获取关系详情
			const relation = {
				id: options.id,
				name: '李四',
				type: '同事'
			};
			this.name = relation.name;
			this.type = relation.type;
			this.id = relation.id;
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
				// 模拟更新关系信息
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