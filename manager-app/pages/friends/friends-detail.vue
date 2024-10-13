<template>
	<view class="container">
		<van-cell title="名称" :value="relation.name" />
		<van-cell title="关系类型" :value="relation.type" />
		<van-button type="primary" block @click="editRelation">编辑关系</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				relation: {
					id: null,
					name: '',
					type: ''
				}
			};
		},
		onLoad(options) {
			// 模拟获取关系详情
			this.relation = {
				id: options.id,
				name: '李四',
				type: '同事'
			};
		},
		methods: {
			editRelation() {
				uni.navigateTo({
					url: `/pages/friends/friends-edit`
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