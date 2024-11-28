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
			<view class="add-icon" @click="addFood()">
				<u-icon name="plus" size="20"></u-icon>
			</view>
		</view>

		<view class="food-content">
			<view class="food-card">
				<view class="three-meals">
					<view class="card-head">
						<u-cell-group :border="false">

							<up-swipe-action>
								<up-swipe-action-item class="birth-items" :border="false" v-for="(item,index) in foodList"
									:key="item.id" @click="delBirth(item)" :options="options1" @close="" @open="">
									<u-cell :border="false" label="2022-06-20 08:00" @click="onFoodDetail(item)">
										<template #title>
											<view style="display: flex;justify-content: space-between;">
												{{item.name}}
												<up-tag text="早餐" v-if="item.type==1"></up-tag>
												<up-tag text="中餐" v-else-if="item.type==2"></up-tag>
												<up-tag text="晚餐" v-else-if="item.type==3"></up-tag>
												<up-tag text="夜宵" v-else-if="item.type==4"></up-tag>
												<up-tag text="聚餐" v-else-if="item.type==5"></up-tag>
												<up-tag text="其他" v-else></up-tag>
											</view>
										</template>
										<template #icon>
											<view>
												<image class="food-image" src="../../static/images/user.png" mode=""></image>
											</view>
										</template>
									</u-cell>
								</up-swipe-action-item>
							</up-swipe-action>

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
							<u-cell @click="goToHistoryPage" :border="false" title="2022-06-19" label="卡路里:1200">
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

		<u-toast ref="uToast"></u-toast>
	</view>
</template>

<script setup>
	import {
		onLoad
	} from '@dcloudio/uni-app'
	import {
		apiFoodList,
		apiFoodDelete
	} from '@/utils/api.js'
	import {
		ref
	} from 'vue'

	const foodList = ref([])

	const options1 = [{
		text: "删除",
		style: {
			backgroundColor: '#f56c6c'
		}
	}]

	function goToHistoryPage() {
		uni.navigateTo({
			url: "/pages/food/history"
		})
	}

	function getFoodList() {
		apiFoodList().then(res => {
			foodList.value = res.data
			console.log(res)
		})
	}

	function onFoodDelete(item) {
		console.log(item)
		apiFoodDelete(item.id).then((res) => {
			getFoodList();
		})
	}

	function onFoodDetail(item) {
		uni.setStorageSync("food", {
			data: item
		})
		uni.navigateTo({
			url: "/pages/food/food-detail"
		})
	}

	onLoad(() => {
		getFoodList()
	})

	function addFood() {
		uni.navigateTo({
			url: "/pages/food/food-add"
		})
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

		.food-top {
			display: flex;
			justify-content: space-between;
			margin-bottom: 30rpx;

			.title {
				.title-text {
					font-weight: bold;
					font-size: 40rpx;
				}
			}
		}

		.food-add {
			display: flex;
			justify-content: space-between;
			margin-bottom: 30rpx;

			.title {
				.title-text {
					font-weight: bold;
				}
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