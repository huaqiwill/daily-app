<template>
	<view class="container">
		<view class="header">
			<text>关系管理</text>

		</view>
		<van-list v-model="loading" :finished="finished" @load="getRelationList">
			<van-cell v-for="(relation, index) in relations" :key="index" :title="relation.name" :label="relation.type"
				is-link @click="navigateToDetail(relation.id)" />
		</van-list>
		<van-button type="primary" block @click="navigateToAddRelation">新增关系</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				relations: [], // 存储关系列表
				loading: false,
				finished: false
			};
		},
		methods: {
			getRelationList() {
				this.loading = true;
				// 模拟获取关系数据
				setTimeout(() => {
					this.relations = [{
							id: 1,
							name: '张三',
							type: '朋友'
						},
						{
							id: 2,
							name: '李四',
							type: '同事'
						}
					];
					this.finished = true;
					this.loading = false;
				}, 1000);
			},
			navigateToAddRelation() {
				uni.navigateTo({
					url: '/pages/relation-add/relation-add'
				});
			},
			navigateToDetail(id) {
				uni.navigateTo({
					url: `/pages/relation-detail/relation-detail?id=${id}`
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