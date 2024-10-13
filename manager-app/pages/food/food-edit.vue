<template>
	<view class="container">
		<van-form @submit="onSubmit">
			<van-field v-model="name" label="食谱名称" placeholder="请输入食谱名称" required />
			<van-field v-model="description" label="描述" placeholder="请输入描述" required />
			<van-field v-model="ingredients" label="食材" placeholder="请输入食材" type="textarea" rows="3" required />
			<van-field v-model="steps" label="步骤" placeholder="请输入步骤" type="textarea" rows="6" required />
			<van-button type="primary" block round native-type="submit">更新食谱</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				name: '',
				description: '',
				ingredients: '',
				steps: '',
				id: null
			};
		},
		onLoad(options) {
			// 模拟获取食谱详情
			const recipe = {
				id: options.id,
				name: '红烧肉',
				description: '香甜可口的美食',
				ingredients: '五花肉、酱油、糖、料酒',
				steps: '1. 切肉...\n2. 上色...\n3. 炖煮...'
			};
			this.name = recipe.name;
			this.description = recipe.description;
			this.ingredients = recipe.ingredients;
			this.steps = recipe.steps;
			this.id = recipe.id;
		},
		methods: {
			onSubmit() {
				if (!this.name || !this.description || !this.ingredients || !this.steps) {
					uni.showToast({
						title: '请填写完整信息',
						icon: 'none'
					});
					return;
				}
				// 模拟更新食谱逻辑
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