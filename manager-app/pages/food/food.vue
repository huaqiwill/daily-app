<template>
	<view class="container">
		<view class="food-top">
			<view class="title">
				<text class="title-text">食材食谱记录</text>
			</view>
			<view class="search">
				<u-icon name="search" size="25"></u-icon>
			</view>
		</view>

		<view class="food-add">
			<view class="title">
				<text class="title-text">今日饮食记录</text>
			</view>
			<view class="add-icon">
				<u-icon name="plus" size="20"></u-icon>
			</view>
		</view>

		<view class="food-content">
			<view class="food-card">
				<view class="three-meals">
					<view class="card-head">
						<view class="meal-header">
							<view class="meal-info">
								<u-avatar class="meal-avatar"></u-avatar>
								<view class="meal-text">
									<text class="title">早餐</text>
									<text class="label">2022-06-20 08:00</text>
								</view>
							</view>
							<view class="meal-arrow">
								<u-icon name="arrow-right"></u-icon>
							</view>
						</view>
						<u-cell-group :border="false">
							<u-cell :border="false" title="鸡蛋三明治" label="卡路里:320">
								<template #icon>
									<view>
										<image class="food-image" src="../../static/images/user.png" mode=""></image>
									</view>
								</template>
							</u-cell>
							<u-cell :border="false" title="全麦面包" label="卡路里:120">
								<template #icon>
									<view>
										<image class="food-image" src="../../static/images/user.png" mode=""></image>
									</view>
								</template>
							</u-cell>
						</u-cell-group>
					</view>
				</view>

				<view class="history-food">
					<view class="history-header">
						<text class="history-title">历史记录</text>
						<u-icon name="arrow-right"></u-icon>
					</view>

					<view class="card">
						<u-cell-group :border="false">
							<u-cell :border="false" title="2022-06-19" label="卡路里:1200">
								<template #icon>
									<view>
										<image class="food-image" src="../../static/images/user.png" mode=""></image>
									</view>
								</template>
							</u-cell>
						</u-cell-group>
					</view>
				</view>

				<view class="history-food">
					<view class="history-header">
						<text class="history-title">食材库存</text>
						<u-icon name="arrow-right"></u-icon>
					</view>

					<view class="card">
						<u-cell-group :border="false">
							<u-cell :border="false" title="西兰花" label="剩余:2个">
								<template #icon>
									<view>
										<image class="food-image" src="../../static/images/user.png" mode=""></image>
									</view>
								</template>
							</u-cell>
						</u-cell-group>
					</view>
				</view>

				<view class="history-food">
					<view class="history-header">
						<text class="history-title">食谱推荐</text>
						<u-icon name="arrow-right"></u-icon>
					</view>

					<view class="card">
						<u-cell-group :border="false">
							<u-cell :border="false" title="健康沙拉" label="卡路里:250">
								<template #icon>
									<view>
										<image class="food-image" src="../../static/images/user.png" mode=""></image>
									</view>
								</template>
							</u-cell>
						</u-cell-group>
					</view>
				</view>

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
		height: 100%;
		min-height: 100vh;

		.u-cell {
			font-weight: bold;
		}

		.food-top,
		.food-add {
			display: flex;
			justify-content: space-between;
			margin-bottom: 30rpx;
		}

		.title {
			.title-text {
				font-weight: bold;
				font-size: 40rpx;
			}
		}

		.add-icon {
			display: flex;
			align-items: center;
		}
	}

	.food-content {
		.food-card {
			.three-meals {
				.card-head {
					border-radius: 20rpx;
					box-shadow: -1rpx 1rpx 10rpx 1rpx rgba(0, 0, 0, .2);
				}
			}
		}

		.meal-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 30rpx 30rpx 0 30rpx;
		}

		.meal-info {
			display: flex;
			align-items: center;
		}

		.meal-avatar {
			margin-right: 20rpx;
		}

		.meal-text {
			display: flex;
			flex-direction: column;

			.label {
				font-size: 25rpx;
				color: #909193;
			}
		}

		.history-food {
			.card {
				border-radius: 20rpx;
				box-shadow: -1rpx 1rpx 10rpx 1rpx rgba(0, 0, 0, .2);
			}

			.history-header {
				display: flex;
				align-items: center;
				justify-content: space-between;
				padding: 20rpx 30rpx;
			}

			.history-title {
				font-weight: bold;
			}
		}

		.food-image {
			width: 80rpx;
			height: 80rpx;
		}
	}
</style>