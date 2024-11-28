<template>
	<view class="content">
		<!-- 搜索框 -->
		<view class="seach-box" @click="gotoSearchPage">
			<u-search @search="onSearch(kw)" class="seach-input" placeholder="日照香炉生紫烟" v-model="kw" @custom="onSearch(kw)"
				bgColor="#fff" :showAction="false"></u-search>
		</view>

		<!-- 轮播图 -->
		<view>
			<up-swiper :list="swiperList" @click="onBannerClick" keyName="image" previousMargin="30" nextMargin="30"
				:autoplay="false" radius="5" circular indicator indicatorMode="line">
			</up-swiper>
		</view>

		<!-- 菜单 -->
		<u-grid :col="4" class="mt-space">
			<u-grid-item v-for="(item, index) in menus.slice(0, 4)" :key="index" @click="goToPage(item.url)">
				<u-icon :name="item.image" :size="46"></u-icon>
				<view class="mt-space">{{ item.name }}</view>
			</u-grid-item>
			<u-grid-item class="mt-space" v-for="(item, index) in menus.slice(4, 8)" :key="index + 4"
				@click="goToPage(item.url)">
				<u-icon :name="item.image" :size="46"></u-icon>
				<view class="mt-space">{{ item.name }}</view>
			</u-grid-item>
		</u-grid>

		<!-- 笔记 -->
		<view>
			<up-card :title="title" :sub-title="subTitle" :thumb="thumb">
				<template #body>
					<view class="" slot="body">
						<view class="u-body-item u-flex u-border-bottom u-col-between u-p-t-0">
							<view class="u-body-item-title u-line-2">瓶身描绘的牡丹一如你初妆，冉冉檀香透过窗心事我了然，宣纸上走笔至此搁一半</view>
							<image
								src="https://img11.360buyimg.com/n7/jfs/t1/94448/29/2734/524808/5dd4cc16E990dfb6b/59c256f85a8c3757.jpg"
								mode="aspectFill"></image>
						</view>
						<view class="u-body-item u-flex u-row-between u-p-b-0">
							<view class="u-body-item-title u-line-2">釉色渲染仕女图韵味被私藏，而你嫣然的一笑如含苞待放</view>
							<image
								src="https://img12.360buyimg.com/n7/jfs/t1/102191/19/9072/330688/5e0af7cfE17698872/c91c00d713bf729a.jpg"
								mode="aspectFill"></image>
						</view>
					</view>
				</template>
				<template #foot>
					<view>
						<up-icon name="chat-fill" size="34" color="" label="30评论"></up-icon>
					</view>
				</template>
			</up-card>
		</view>

		<!-- warter list -->
		<view class="wrap">
			<!-- <up-button @click="clear">清空列表</up-button> -->
			<up-waterfall v-model="flowList" ref="uWaterfallRef">
				<template v-slot:left="{leftList}">
					<view class="demo-warter" v-for="(item, index) in leftList" :key="index">
						<!-- 警告：微信小程序中需要hx2.8.11版本才支持在template中结合其他组件，比如下方的lazy-load组件 -->
						<up-lazy-load threshold="-450" border-radius="10" :image="item.image" :index="index"></up-lazy-load>
						<view class="demo-title">
							{{item.title}}
						</view>
						<view class="demo-price">
							{{item.price}}元
						</view>
						<view class="demo-tag">
							<view class="demo-tag-owner">
								自营
							</view>
							<view class="demo-tag-text">
								放心购
							</view>
						</view>
						<view class="demo-shop">
							{{item.shop}}
						</view>
						<!-- 		<up-icon name="close-circle-fill" color="#fa3534" size="34" class="u-close"
							@click="remove(item.id)"></up-icon> -->
					</view>
				</template>
				<template v-slot:right="{rightList}">
					<view class="demo-warter" v-for="(item, index) in rightList" :key="index">
						<up-lazy-load threshold="-450" border-radius="10" :image="item.image" :index="index"></up-lazy-load>
						<view class="demo-title">
							{{item.title}}
						</view>
						<view class="demo-price">
							{{item.price}}元
						</view>
						<view class="demo-tag">
							<view class="demo-tag-owner">
								自营
							</view>
							<view class="demo-tag-text">
								放心购
							</view>
						</view>
						<view class="demo-shop">
							{{item.shop}}
						</view>
						<!-- 	<up-icon name="close-circle-fill" color="#fa3534" size="34" class="u-close"
							@click="remove(item.id)"></up-icon> -->
					</view>
				</template>
			</up-waterfall>
			<up-loadmore bg-color="rgb(240, 240, 240)" :status="loadStatus" @loadmore="addRandomData"></up-loadmore>
		</view>

	</view>
</template>

<script setup>
	import {
		ref
	} from 'vue'
	import {
		onLoad,
		onReachBottom
	} from '@dcloudio/uni-app'
	import {
		openWebPage
	} from '@/utils/index.js'



	import {
		swiperData,
		menuData
	} from './data.js'

	const kw = ""

	function gotoSearchPage() {
		uni.navigateTo({
			url: "/pages/index/search"
		})
	}
	const show = false
	const swiperList = ref([])

	function onBannerClick(index) {
		// 获取当前点击项的url
		const url = swiperList.value[index].url;
		console.log(url);
		// 跳转到指定页面
		openWebPage(url)
	}

	const title = '素胚勾勒出青花，笔锋浓转淡'
	const subTitle = '2020-05-15'
	const thumb = 'https://img11.360buyimg.com/n7/jfs/t1/94448/29/2734/524808/5dd4cc16E990dfb6b/59c256f85a8c3757.jpg'
	const loadStatus = ref('loadmore')
	const flowList = []
	const uToastRef = ref()
	const list = ref([])

	const menus = ref([])

	function goToPage(page) {
		if (page) {
			uni.navigateTo({
				url: page
			});
		}
	}

	onLoad(() => {
		menus.value = menuData
		swiperList.value = swiperData
	})

	onReachBottom(() => {
		// 触底执行
		loadStatus.value = 'loading';
		// 模拟数据加载
		setTimeout(() => {
			addRandomData();
			loadStatus.value = 'loadmore';
		}, 1000)
	})


	function onSearch(val) {
		uni.showToast({
			message: val,
			type: "success"
		})
	}

	function guid() {
		return 1;
	}

	function random(a, b) {
		return 1;
	}

	function addRandomData() {
		for (let i = 0; i < 10; i++) {
			let index = random(0, list.length - 1);
			// 先转成字符串再转成对象，避免数组对象引用导致数据混乱
			let item = JSON.parse(JSON.stringify(list[index]))
			item.id = guid();
			flowList.push(item);
		}
	}

	const uWaterfallRef = ref()

	function remove(id) {
		uWaterfallRef.remove(id);
	}

	function clear() {
		uWaterfallRef.clear();
	}
</script>

<style>
	/* page不能写带scope的style标签中，否则无效 */
	page {
		background-color: rgb(240, 240, 240);
	}
</style>
<style scoped>
	.nav {
		width: 100%;
		display: flex;
		justify-content: space-evenly;
		margin-top: 100rpx;
		flex-wrap: wrap;
	}

	.nav-item {
		width: 100rpx;
		height: 100rpx;
		/* 	background-color: red; */
		text-align: center;
		line-height: 100rpx;
		border-radius: 20px;
		overflow: hidden;
	}

	.nav-item-box {
		width: 22%;
		/* 每项占据 1/4 的宽度，22% 包括边距 */
		margin-bottom: 20rpx;
		/* 每行之间的间距 */
		text-align: center;
		font-size: 28rpx;
	}

	.nav-item image {
		width: 100%;
		height: 100%;
		transform: scale(1.3);
		transform-origin: center center;
	}

	.seach-box {
		display: flex;
		padding: 20rpx 15rpx;
	}

	.seach-input {
		flex: 6 !important;
	}

	/* u-card */
	.u-card-wrap {
		background-color: $up-bg-color;
		padding: 1px;
	}

	.u-body-item {
		font-size: 32rpx;
		color: #333;
		padding: 20rpx 10rpx;
	}

	.u-body-item image {
		width: 120rpx;
		flex: 0 0 120rpx;
		height: 120rpx;
		border-radius: 8rpx;
		margin-left: 12rpx;
	}

	/* end-u-card */



	/* warter */
	.demo-warter {
		border-radius: 8px;
		margin: 5px;
		background-color: #ffffff;
		padding: 8px;
		position: relative;
	}

	.u-close {
		position: absolute;
		top: 32rpx;
		right: 32rpx;
	}

	.demo-image {
		width: 100%;
		border-radius: 4px;
	}

	.demo-title {
		font-size: 30rpx;
		margin-top: 5px;
		color: $up-main-color;
	}

	.demo-tag {
		display: flex;
		margin-top: 5px;
	}

	.demo-tag-owner {
		background-color: $up-type-error;
		color: #FFFFFF;
		display: flex;
		align-items: center;
		padding: 4rpx 14rpx;
		border-radius: 50rpx;
		font-size: 20rpx;
		line-height: 1;
	}

	.demo-tag-text {
		border: 1px solid $up-type-primary;
		color: $up-type-primary;
		margin-left: 10px;
		border-radius: 50rpx;
		line-height: 1;
		padding: 4rpx 14rpx;
		display: flex;
		align-items: center;
		border-radius: 50rpx;
		font-size: 20rpx;
	}

	.demo-price {
		font-size: 30rpx;
		color: $up-type-error;
		margin-top: 5px;
	}

	.demo-shop {
		font-size: 22rpx;
		color: $up-tips-color;
		margin-top: 5px;
	}
</style>