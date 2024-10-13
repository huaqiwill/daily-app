<!-- pages/bill-edit.vue -->
<template>
	<view class="container">
		<view class="header">
			<text>编辑账单</text>
		</view>

		<van-form @submit="onSubmit">
			<van-cell-group>
				<van-field v-model="bill.title" label="账单名称" required />
				<van-field v-model="bill.amount" label="金额" required type="number" />
			</van-cell-group>
			<van-button round block type="primary" native-type="submit">保存</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				bill: {
					id: 1, // 初始化账单 ID
					title: '电费',
					amount: 200
				}
			};
		},
		methods: {
			onSubmit() {
				// 提交账单修改
				uni.showToast({
					title: '账单已保存',
					icon: 'success'
				});

				// 返回账单管理页面
				uni.navigateBack();
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
</style>