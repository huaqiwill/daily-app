<template>
	<view class="container">
		<view class="header">
			<text>生日管理</text>

		</view>
		<van-list v-model="loading" :finished="finished" @load="getBirthdayList">
			<van-cell v-for="(birthday, index) in birthdays" :key="index" :title="birthday.name" :label="birthday.date"
				is-link @click="navigateToDetail(birthday.id)" />
		</van-list>
		<van-button type="primary" block @click="navigateToAddBirthday">新增生日</van-button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				birthdays: [], // 存储生日列表
				loading: false,
				finished: false
			};
		},
		methods: {
			getBirthdayList() {
				this.loading = true;
				// 模拟获取生日数据
				setTimeout(() => {
					this.birthdays = [{
							id: 1,
							name: '张三',
							date: '1990-08-15'
						},
						{
							id: 2,
							name: '李四',
							date: '1992-11-23'
						}
					];
					this.finished = true;
					this.loading = false;
				}, 1000);
			},
			navigateToAddBirthday() {
				uni.navigateTo({
					url: '/pages/birthday-add/birthday-add'
				});
			},
			navigateToDetail(id) {
				uni.navigateTo({
					url: `/pages/birthday-detail/birthday-detail?id=${id}`
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