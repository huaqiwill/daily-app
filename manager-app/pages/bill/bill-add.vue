<!-- pages/bill-add.vue -->
<template>
	<view class="container">
		<view class="header">
			<text>新增账单</text>
		</view>

		<van-form @submit="onSubmit">
			<van-cell-group>
				<van-field v-model="newBill.title" label="账单名称" placeholder="输入账单名称" required />
				<van-field v-model="newBill.amount" label="金额" placeholder="输入金额" type="number" required />
			</van-cell-group>
			<van-button round block type="primary" native-type="submit">添加账单</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				newBill: {
					title: '',
					amount: null
				}
			};
		},
		methods: {
			onSubmit() {
				// 提交新账单
				uni.showToast({
					title: '账单已添加',
					icon: 'success'
				});

				// 返回账单管理页面
				uni.navigateBack();
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
	}

	.header {
		font-size: 24px;
		text-align: center;
		margin-bottom: 20px;
	}
</style>