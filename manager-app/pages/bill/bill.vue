<!-- pages/bill-management.vue -->
<template>
	<view class="container">
		<view class="header">
			<text>账单管理</text>
		</view>

		<view class="bill-list">
			<view v-for="bill in bills" :key="bill.id" class="bill-item" @click="editBill(bill.id)">
				<text>{{ bill.title }}</text>
				<text>{{ bill.amount }} 元</text>
			</view>
		</view>

		<view class="add-bill-btn" @click="addBill">
			<van-button type="primary" round block>新增账单</van-button>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				bills: [{
						id: 1,
						title: '电费',
						amount: 200
					},
					{
						id: 2,
						title: '水费',
						amount: 100
					},
					// 可继续添加账单项...
				]
			};
		},
		methods: {
			editBill(id) {
				// 跳转到账单编辑页面
				uni.navigateTo({
					// url: `/pages/bill/bill-edit?id=${id}`
					url:"/pages/bill/bill-detail"
				});
			},
			addBill() {
				// 跳转到新增账单页面
				uni.navigateTo({
					url: '/pages/bill/bill-add'
				});
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
		/* background-color: #f8f8f8; */
	}

	.header {
		font-size: 24px;
		text-align: center;
		margin-bottom: 20px;
	}

	.bill-list {
		margin-bottom: 20px;
	}

	.bill-item {
		display: flex;
		justify-content: space-between;
		padding: 10px;
		background-color: #fff;
		margin-bottom: 10px;
		border-radius: 8px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	.add-bill-btn {
		margin-top: 20px;
	}
</style>