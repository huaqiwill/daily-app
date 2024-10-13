<template>
	<view class="container">
		<van-cell title="标题" :value="note.title" />
		<van-cell title="内容" :value="note.content" />
		<van-button type="primary" block @click="editNote">编辑笔记</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				note: {
					id: null,
					title: '',
					content: ''
				}
			};
		},
		onLoad(options) {
			// 模拟获取笔记详情
			this.note = {
				id: options.id,
				title: '示例标题',
				content: '示例内容'
			};
		},
		methods: {
			editNote() {
				uni.navigateTo({
					url: `/pages/notes/notes-edit?id=${this.note.id}`
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