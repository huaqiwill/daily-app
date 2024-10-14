<template>
	<view class="container">
		<van-cell title="标题" :value="todo.title" />
		<van-cell title="描述" :value="todo.description" />
		<van-button type="primary" block @click="editTodo">编辑待办</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				todo: {
					id: null,
					title: '',
					description: ''
				}
			};
		},
		onLoad(options) {
			// 模拟获取待办事项详情
			this.todo = {
				id: options.id,
				title: '完成项目报告',
				description: '需要提交季度项目报告'
			};
		},
		methods: {
			editTodo() {
				uni.navigateTo({
					url: `/pages/todos/todos-edit`
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