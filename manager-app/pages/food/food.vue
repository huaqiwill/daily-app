<template>
	<view class="container">
		<view class="food-top">
			<view class="titlt">
				<text class="title-text">食材食谱记录</text>
			</view>
			<view class="search">
				<u-icon name="search"></u-icon>
			</view>
		</view>

		<view class="food-add">
			<view class="titlt">
				<text class="title-text">今日饮食记录</text>
			</view>
			<view class="search">
				<u-icon name="plus"></u-icon>
			</view>
		</view>

		<view class="food-content">
			<view class="food-card">
				<view class="three-meals">
					<view class="card-head">
						<u-cell-group :border="false">
							<u-cell :border="false" title="早餐" label="2022-06-20 08:00" :is-link="true">
								<template #icon>
									<view>
										<u-avatar></u-avatar>
									</view>
								</template>
							</u-cell>
							<u-cell :border="false" title="鸡蛋三明治" label="卡路里:320">
								<template #icon>
									<view>
										<u-icon name="plus"></u-icon>
									</view>
								</template>
							</u-cell>
							<u-cell :border="false" title="全麦面包" label="卡路里:120">
								<template #icon>
									<view>
										<u-icon name="plus"></u-icon>
									</view>
								</template>
							</u-cell>
						</u-cell-group>
					</view>
				</view>


				<view class="history-food">
					<view class="top">
						<u-cell-group :border="false">
							<u-cell :border="false" title="历史记录" :is-link="true">
								<!-- 自定义 -->
							</u-cell>
						</u-cell-group>
					</view>

					<view class="card">
						<u-cell-group :border="false">
							<u-cell :border="false" title="2022-06-19" label="卡路里:1200">
								<!-- 自定义 -->
								<template #icon>
									<view>
										<u-icon name="plus"></u-icon>
									</view>
								</template>
							</u-cell>
						</u-cell-group>
					</view>

				</view>
				
				
				<view class="history-food">
					<view class="top">
						<u-cell-group :border="false">
							<u-cell :border="false" title="食材库存" :is-link="true">
								<!-- 自定义 -->
							</u-cell>
						</u-cell-group>
					</view>
				
					<view class="card">
						<u-cell-group :border="false">
							<u-cell :border="false" title="西兰花" label="剩余:2个">
								<!-- 自定义 -->
								<template #icon>
									<view>
										<u-icon name="plus"></u-icon>
									</view>
								</template>
							</u-cell>
						</u-cell-group>
					</view>
				
				</view>
				
				
				<view class="history-food">
					<view class="top">
						<u-cell-group :border="false">
							<u-cell :border="false" title="食谱推荐" :is-link="true">
								<!-- 自定义 -->
							</u-cell>
						</u-cell-group>
					</view>
				
					<view class="card">
						<u-cell-group :border="false">
							<u-cell :border="false" title="健康沙拉" label="卡路里:250">
								<!-- 自定义 -->
								<template #icon>
									<view>
										<u-icon name="plus"></u-icon>
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
		/* 设置背景颜色 */
		height: 100%;
		/* 确保填充整个页面 */
		min-height: 100vh;
		/* 确保在小屏幕设备上依然填充整个页面 */
	}

	.food-content {
		.food-card {
			.three-meals {
				.card-head {
					// background-color: red;
					border-radius: 20rpx;
					box-shadow: 1rpx 1rpx 2rpx 1rpx rgba(0, 0, 0, .2);
				}
			}
		}

		.history-food {
			.card {
				border-radius: 20rpx;
				box-shadow: 1rpx 1rpx 2rpx 1rpx rgba(0, 0, 0, .2);
			}
		}
	}
</style>