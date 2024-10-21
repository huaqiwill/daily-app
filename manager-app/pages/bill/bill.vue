<template>
	<view class="container">
		<view class="bill-top">
			<view class="title">
				<text>账单管理</text>
			</view>
			<view class="edit">
				<u-icon name="more-dot-fill"></u-icon>
			</view>
		</view>

		<view class="general_income">
			<view class="current-month">
				<view class="title">
					<text>总收入</text>
				</view>
				<view class="general_income_money">
					<view style="display: flex; align-items: center">
						<image style="width: 50rpx; height: 50rpx;margin-right: 10rpx;" src="../../static/images/arrow-up-circle.png">
						</image>
						<text style="color: #2e48de;">+10%</text>
					</view>
				</view>
			</view>
			<view class="last-month">
				<view class="title">
					<text><text style="font-weight: bold;">¥3200.00</text>本月</text>
				</view>
				<view class="general_income_money">
					<text>上月<text style="font-weight: bold;">¥{{2400.00}}</text></text>
				</view>
			</view>
		</view>

		<view class="total_expenditure">
			<view class="current-month">
				<view class="title">
					<text>总支出</text>
				</view>
				<view class="total_expenditure_money">
					<view style="display: flex; align-items: center">
						<image style="width: 50rpx; height: 50rpx;margin-right: 10rpx;" src="../../static/images/arrow-down-circle.png">
						</image>
						<text style="color: #d81e06;">-5%</text>
					</view>
				</view>
			</view>
			<view class="last-month">
				<view class="title">
					<text><text style="font-weight: bold;">¥1800.00</text>本月</text>

				</view>
				<view class="total_expenditure_money">
					<text>上月<text style="font-weight: bold;">¥{{2200.00}}</text></text>
				</view>
			</view>
		</view>


		<view class="latest_statement">
			<view class="title">
				<text style="font-weight: bold;">最近账单</text>
			</view>
			<view class="bill_cell">
				<up-cell-group :border="false" class="bill_cell_group">
					<up-cell class="cell-item" :border="false" title="夕阳无限好" value="+1000">
						<template #icon>
							<image class="cell-image" src="../../favicon.ico"></image>
						</template>
						<!-- <up-badge count="99" :absolute="false" slot="right-icon"></up-badge> -->
					</up-cell>
					<up-cell class="cell-item" :border="false" title="只是近黄昏" value="-1000">
						<template #icon>
							<image class="cell-image" src="../../favicon.ico"></image>
						</template>
					</up-cell>
				</up-cell-group>
			</view>
		</view>


		<view class="latest_statement">
			<view class="title">
				<text style="font-weight: bold;">收入统计</text>
			</view>
			<view class="bill_cell">
				<up-cell-group :border="false" class="bill_cell_group">
					<up-cell class="cell-item" :border="false" title="夕阳无限好" value="+1000">
						<template #icon>
							<image class="cell-image" src="../../favicon.ico">
							</image>
						</template>
						<!-- <up-badge count="99" :absolute="false" slot="right-icon"></up-badge> -->
					</up-cell>
					<up-cell class="cell-item" :border="false" title="只是近黄昏" value="-1000">
						<template #icon>
							<image class="cell-image" src="../../favicon.ico"></image>
						</template>
					</up-cell>
				</up-cell-group>
			</view>
		</view>
		
		
	</view>
</template>
<script>
	export default {
		data() {
			return {

			}
		},
		onLoad() {

		},
		methods: {

		}
	}
</script>
<style scoped lang="scss">
	.container {
		padding: 30rpx 30rpx;
		background-color: #f5f5f5;
		/* 设置背景颜色 */
		height: 100%;
		/* 确保填充整个页面 */
		min-height: 100vh;
		/* 确保在小屏幕设备上依然填充整个页面 */
	}

	.container {
		.bill-top {
			display: flex;
			justify-content: space-between;

			.title {
				text {
					font-weight: bold;
				}
			}
		}

		.general_income,
		.total_expenditure {
			display: flex;
			justify-content: space-between;
			margin-top: 30rpx;

			.general_income_money,
			.total_expenditure_money {
				display: flex;
				justify-content: center;
				margin-top: 20rpx;
			}
		}

		.latest_statement {
			margin-top: 30rpx;

			.bill_cell_group {
				margin-top: 20rpx;

				.cell-image {
					width: 60rpx;
					height: 60rpx;
				}

				.cell-item {
					border: 1rpx solid darkgray;
					margin-bottom: 20rpx;
					border-radius: 10rpx;
				}
			}
		}

	}
</style>