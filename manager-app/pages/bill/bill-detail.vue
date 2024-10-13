<!-- pages/bill-detail.vue -->
<template>
	<view class="container">
		<view class="header">
			<text>账单详情</text>
		</view>

		<view class="bill-info">
			<view class="bill-item">
				<text class="label">账单名称：</text>
				<text class="value">{{ bill.title }}</text>
			</view>
			<view class="bill-item">
				<text class="label">金额：</text>
				<text class="value">{{ bill.amount }} 元</text>
			</view>
			<view class="bill-item">
				<text class="label">创建日期：</text>
				<text class="value">{{ bill.date }}</text>
			</view>
			<view class="bill-item">
				<text class="label">备注：</text>
				<text class="value">{{ bill.remark }}</text>
			</view>
		</view>

		<view class="edit-btn">
			<van-button round block type="primary" @click="editBill">编辑账单</van-button>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				bill: {
					id: 1, // 初始化账单 ID
					title: '电费',
					amount: 200,
					date: '2024-10-13',
					remark: '本月电费较高'
				}
			};
		},
		methods: {
			editBill() {
				// 跳转到账单编辑页面
				uni.navigateTo({
					url: `/pages/bill/bill-edit`
				});
			}
		},
		onLoad(options) {
			const id = options.id; // 获取传递过来的账单 ID
			// TODO: 根据 ID 加载账单数据
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

	.bill-info {
		background-color: #fff;
		padding: 15px;
		border-radius: 10px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	.bill-item {
		display: flex;
		justify-content: space-between;
		padding: 10px 0;
	}

	.label {
		font-weight: bold;
	}

	.value {
		color: #333;
	}

	.edit-btn {
		margin-top: 20px;
	}
</style>