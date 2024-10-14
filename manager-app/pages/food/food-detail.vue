<template>
	<view class="container">
		<van-cell title="食谱名称" :value="recipe.name" />
		<van-cell title="描述" :value="recipe.description" />
		<van-cell title="食材" :value="recipe.ingredients" />
		<van-cell title="步骤" :value="recipe.steps" />
		<van-button type="primary" block @click="editRecipe">编辑食谱</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				recipe: {
					id: null,
					name: '',
					description: '',
					ingredients: '',
					steps: ''
				}
			};
		},
		onLoad(options) {
			// 模拟获取食谱详情
			this.recipe = {
				id: options.id,
				name: '红烧肉',
				description: '香甜可口的美食',
				ingredients: '五花肉、酱油、糖、料酒',
				steps: '1. 切肉...\n2. 上色...\n3. 炖煮...'
			};
		},
		methods: {
			editRecipe() {
				uni.navigateTo({
					url: `/pages/food/food-edit`
				});
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
	}
</style>