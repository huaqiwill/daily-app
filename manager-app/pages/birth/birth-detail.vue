<template>
	<view class="container">
		<van-cell title="姓名" :value="birthday.name" />
		<van-cell title="生日日期" :value="birthday.date" />
		<van-button type="primary" block @click="editBirthday">编辑生日</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				birthday: {
					id: null,
					name: '',
					date: ''
				}
			};
		},
		onLoad(options) {
			// 模拟获取生日详情
			this.birthday = {
				id: options.id,
				name: '李四',
				date: '1992-11-23'
			};
		},
		methods: {
			editBirthday() {
				uni.navigateTo({
					url: `/pages/birth/birth-edit`
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