<template>
	<view class="container">
		<view class="bill-top">
			<text class="title">账单分析</text>
			<view class="bill-chart">
				<l-echart class="echart" ref="chart" @finished="init"></l-echart>
			</view>
		</view>
	</view>
</template>

<script>
	import * as echarts from 'echarts';

	export default {
		data() {
			return {
				state: {
					option: {
						legend: {
							show: true,
							data: []
						},
						tooltip: {
							trigger: 'axis',
							axisPointer: {
								type: 'cross'
							}
						},
						grid: {
							left: '3%',
							right: '8%',
							top: '15%',
							bottom: '5%',
							containLabel: true
						},
						xAxis: {
							type: 'category',
							data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
							axisLabel: {},
							axisTick: {
								show: false
							},
							axisLine: {
								show: true,
								lineStyle: {
									color: '#83bff6'
								}
							},
							z: 10
						},
						yAxis: {
							type: 'value',
							axisLine: {
								show: true,
								lineStyle: {
									color: '#83bff6'
								}
							},
							axisTick: {
								show: false
							},
							splitLine: {
								show: true,
								lineStyle: {
									type: 'dashed',
									color: '#83bff6'
								}
							}
						},
						series: [{
							data: [100, 110, 113, 126, 143, 158, 165, 167, 152, 102], // 删除多余的逗号
							type: "line",
							itemStyle: {
								color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
										offset: 0,
										color: '#83bff6'
									},
									{
										offset: 0.5,
										color: '#188df0'
									},
									{
										offset: 1,
										color: '#188df0'
									}
								])
							},
							emphasis: {
								itemStyle: {
									color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
											offset: 0,
											color: '#2378f7'
										},
										{
											offset: 0.7,
											color: '#2378f7'
										},
										{
											offset: 1,
											color: '#83bff6'
										}
									])
								}
							},
							areaStyle: {
								show: true,
								color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
										offset: 0,
										color: '#188df0'
									},
									{
										offset: 1,
										color: '#fff'
									}
								])
							}
						}],
						color: ['#83bff6']
					}
				}
			}
		},
		onLoad() {
			// 如果有需要初始化的内容可以在这里处理
		},
		mounted() {
			this.$refs.chart.init(echarts, chart => {
				chart.setOption(this.state.option); // 使用 this.state.option
			});
		},
		methods: {
			init() {
				console.log("图表加载成功");
			}
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
		.bill-top{
			.title{
				font-weight: bold;
			}
		}
	}
</style>