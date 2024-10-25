<template>
	<view class="container">
		<view class="" style="display: flex; justify-content: space-between; align-items: center;">
			<view class="" style="display: flex;align-items: center; ">
				<view class="">
					<u-avatar></u-avatar>
				</view>
				<view class="" style="font-weight: bold;font-size: 35rpx;margin-left: 20rpx;">
					<text>新增账单</text>
				</view>
			</view>

			<view class="">
				<text>保存</text>
			</view>

		</view>

		<view class=""
			style="border: 1px solid gainsboro; padding: 35rpx 20rpx; margin-top: 25rpx;border-radius: 20rpx;">
			<view class="">
				<text>基本信息</text>
			</view>
			<!-- 			<u-cell-group>
				<u-cell title="姓名" label="请选择姓名"></u-cell>
			</u-cell-group> -->
			<view class="">

				<view class=""
					style="display: flex; justify-content: space-between; align-items: center;margin-top: 25rpx;">
					<view class="" style="display: flex; align-items: center;">
						<view class="">
							<u-icon name="calendar" size="25"></u-icon>
						</view>
						<view class="">
							<text>日期</text>
						</view>
					</view>

					<view class="">
						<text style="font-size: 25rpx; color: #a1a4ac;">请选择时间</text>
					</view>
				</view>

				<view class="" style="margin-top: 25rpx;">
					<up-radio-group style="display: flex;" v-model="radiovalue1" placement="row" @change="groupChange">
						<up-radio :customStyle="{marginBottom: '8px'}" v-for="(item, index) in radiolist1" :key="index"
							:label="item.name" :name="item.name" @change="radioChange">
						</up-radio>
					</up-radio-group>
				</view>

				<view class="" style="margin-top: 25rpx;">
					<view class="" style="margin-bottom: 25rpx;">
						<text>金额</text>
					</view>
					<view class="">
						<u-input style="background-color: #fff;" type="text" placeholder="请输入金额"></u-input>
					</view>
				</view>

				<view class="" style="margin-top: 25rpx;">
					<view class="" style="margin-bottom: 25rpx;">
						<text>备注</text>
					</view>
					<view class="">
						<up-textarea v-model="value1" placeholder="请输入备注"></up-textarea>
					</view>
				</view>
			</view>

		</view>

		<view class=""
			style="border: 1px solid gainsboro; padding: 35rpx 20rpx; margin-top: 25rpx;border-radius: 20rpx;">
			<view class="">
				<view class="">
					<text>分类</text>
				</view>

				<view class="" style="display: flex; justify-content: space-evenly;">
					<view class="">
						<view class="">
							<image style="width: 80rpx;height: 80rpx;" src="../../favicon.ico" mode=""></image>
						</view>
						<view class="">
							<text>餐饮</text>
						</view>
					</view>

					<view class="">
						<view class="">
							<image style="width: 80rpx;height: 80rpx;" src="../../favicon.ico" mode=""></image>
						</view>
						<view class="">
							<text>购物</text>
						</view>
					</view>

					<view class="">
						<view class="">
							<image style="width: 80rpx;height: 80rpx;" src="../../favicon.ico" mode=""></image>
						</view>
						<view class="">
							<text>交通</text>
						</view>
					</view>

					<view class="">
						<view class="">
							<image style="width: 80rpx;height: 80rpx;" src="../../favicon.ico" mode=""></image>
						</view>
						<view class="">
							<text>娱乐</text>
						</view>
					</view>
				</view>
			</view>
		</view>


		<view class=""
			style="border: 1px solid gainsboro; padding: 35rpx 20rpx; margin-top: 25rpx;border-radius: 20rpx;">
			<view class="">
				<text>附件</text>
			</view>

			<view class="" style="display: flex; justify-content: space-evenly;">
				<view class="">
					<view class="">
						<image style="width: 80rpx;height: 80rpx;" src="../../favicon.ico" mode=""></image>
					</view>
					<view class="">
						<text>票据</text>
					</view>
				</view>

				<view class="">
					<view class="">
						<image style="width: 80rpx;height: 80rpx;" src="../../favicon.ico" mode=""></image>
					</view>
					<view class="">
						<text>发票</text>
					</view>
				</view>

				<view class="">
					<view class="">
						<image style="width: 80rpx;height: 80rpx;" src="../../favicon.ico" mode=""></image>
					</view>
					<view class="">
						<text>文档</text>
					</view>
				</view>
			</view>
		</view>

		<view class=""
			style="border: 1px solid gainsboro; padding: 35rpx 20rpx; margin-top: 25rpx;border-radius: 20rpx;">

			<view class="">
				<text>位置</text>
			</view>

			<view class="">
				<u-cell-group :border="false">
					<u-cell :border="false" title="当前位置" label="获取位置">
						<template #icon>
							<view>
								<u-icon name="map"></u-icon>
							</view>
						</template>
					</u-cell>
				</u-cell-group>
			</view>
		</view>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				radiolist1: [{
						name: '收入',
						disabled: false
					},
					{
						name: '支出',
						disabled: false
					}
				],
			}
		},
		onLoad() {

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
</style>