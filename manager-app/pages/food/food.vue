<template>
	<view class="container">
		<view class="header">
			<text>食谱管理</text>

		</view>
		<van-list v-model="loading" :finished="finished" @load="getRecipeList">
			<van-cell v-for="(recipe, index) in recipes" :key="index" :title="recipe.name" :label="recipe.description"
				is-link @click="navigateToDetail(recipe.id)" />
		</van-list>
		<van-button type="primary" block @click="navigateToAddRecipe">新增食谱</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				recipes: [], // 存储食谱列表
				loading: false,
				finished: false
			};
		},
		methods: {
			getRecipeList() {
				this.loading = true;
				// 模拟获取食谱数据
				setTimeout(() => {
					this.recipes = [{
							id: 1,
							name: '番茄炒蛋',
							description: '经典的家常菜'
						},
						{
							id: 2,
							name: '红烧肉',
							description: '香甜可口的美食'
						}
					];
					this.finished = true;
					this.loading = false;
				}, 1000);
			},
			navigateToAddRecipe() {
				uni.navigateTo({
					url: '/pages/recipe-add/recipe-add'
				});
			},
			navigateToDetail(id) {
				uni.navigateTo({
					url: `/pages/recipe-detail/recipe-detail?id=${id}`
				});
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
	}

	.header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-bottom: 20px;
	}
</style>