<template>
	<view class="container">
		<view class="header">
			<text>待办事项管理</text>

		</view>
		<van-list v-model="loading" :finished="finished" @load="getTodoList">
			<van-cell v-for="(todo, index) in todos" :key="index" :title="todo.title" :label="todo.description" is-link
				@click="navigateToDetail(todo.id)" />
		</van-list>
		<van-button type="primary" block @click="navigateToAddTodo">新增待办</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				todos: [], // 存储待办事项
				loading: false,
				finished: false
			};
		},
		methods: {
			getTodoList() {
				this.loading = true;
				// 模拟获取待办事项数据
				setTimeout(() => {
					this.todos = [{
							id: 1,
							title: '完成项目报告',
							description: '需要提交季度项目报告'
						},
						{
							id: 2,
							title: '购买生日礼物',
							description: '购买生日礼物给朋友'
						}
					];
					this.finished = true;
					this.loading = false;
				}, 1000);
			},
			navigateToAddTodo() {
				uni.navigateTo({
					url: '/pages/todo-add/todo-add'
				});
			},
			navigateToDetail(id) {
				uni.navigateTo({
					url: `/pages/todo-detail/todo-detail?id=${id}`
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