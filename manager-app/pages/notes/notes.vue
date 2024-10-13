<template>
	<view class="container">
		<view class="header">
			<text>笔记管理</text>

		</view>
		<van-list v-model="loading" :finished="finished" @load="getNoteList">
			<van-cell v-for="(note, index) in notes" :key="index" :title="note.title" :label="note.content" is-link
				@click="navigateToDetail(note.id)" />
		</van-list>

		<van-button type="primary" block @click="navigateToAddNote">新增笔记</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				notes: [],
				loading: false,
				finished: false
			};
		},
		methods: {
			getNoteList() {
				this.loading = true;
				// 模拟获取笔记数据
				// setTimeout(() => {
				this.notes = [{
						id: 1,
						title: '第一篇笔记',
						content: '这是第一篇笔记内容'
					},
					{
						id: 2,
						title: '第二篇笔记',
						content: '这是第二篇笔记内容'
					}
				];
				this.finished = true;
				this.loading = false;
				// }, 1000);
			},
			navigateToAddNote() {
				uni.navigateTo({
					url: '/pages/notes/notes-add'
				});
			},
			navigateToDetail(id) {
				uni.navigateTo({
					url: `/pages/notes/notes-detail?id=${id}`
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