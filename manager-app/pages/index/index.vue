<template>
	<view class="content">
		<up-toast ref="uToastRef"></up-toast>
		<view class="seach-box">
			<u-search @search="onSearch(kw)" class="seach-input" placeholder="日照香炉生紫烟" v-model="kw"
				@custom="onSearch(kw)" bgColor="#fff"></u-search>
		</view>

		<!-- <swiper circular :indicator-dots="true" :autoplay="true" :interval="3000" :duration="1000"
			style="width: 100%;height: 350rpx;">
			<swiper-item style="background-color: red; text-align: center;">
				<view class="swiper-item">
					<image src="../../static/banner/1.png" style="width: 100%;"></image>
				</view>
			</swiper-item>
			<swiper-item style="background-color: green; text-align: center;">
				<view class="swiper-item">
					<image src="../../static/banner/2.png" style="width: 100%;"></image>
				</view>
			</swiper-item>
		</swiper> -->

		<view class="u-demo-block">
			<!-- <text class="u-demo-block__title">卡片式</text> -->
			<up-swiper :list="list3" previousMargin="30" nextMargin="30" circular :autoplay="false" radius="5"
				</up-swiper>
		</view>

		<view>
			<view class="nav">
				<view class="nav-item-box" @click="goToProfile()">
					<view class="nav-item nav_profile">
						<image src="../../static/images/user.png" mode=""></image>
					</view>
					<text>用户</text>
				</view>
				<view class="nav-item-box" @click="">
					<view class="nav-item nav_birth">
						<image src="../../static/images/public-relations.png" mode=""></image>
					</view>
					<text>关系</text>
				</view>

				<view class="nav-item-box" @click="goToNote()">
					<view class="nav-item nav_friends">
						<image src="../../static/images/notes.png" mode=""></image>
					</view>
					<text>笔记</text>
				</view>

				<view class="nav-item-box" @click="goToBill()">
					<view class="nav-item nav_friends">
						<image src="../../static/images/invoice.png" mode=""></image>
					</view>
					<text>账单</text>
				</view>

			</view>
			<view class="nav">
				<view class="nav-item-box" @click="goToTodos()">
					<view class="nav-item nav_profile">
						<image src="../../static/images/backlog.png" mode=""></image>
					</view>
					<text>待办</text>
				</view>

				<view class="nav-item-box" @click="goToMessage()">
					<view class="nav-item nav_birth">
						<image src="../../static/images/megaphone.png" mode=""></image>
					</view>
					<text>通知</text>
				</view>

				<view class="nav-item-box" @click="goToBirth()">
					<view class="nav-item nav_friends">
						<image src="../../static/images/birth.png" mode=""></image>
					</view>
					<text>生日</text>
				</view>

				<view class="nav-item-box" @click="">
					<view class="nav-item nav_friends">
						<image src="../../static/images/user.png" mode=""></image>
					</view>
					<text>Lore</text>
				</view>
			</view>
		</view>


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
						<up-lazy-load threshold="-450" border-radius="10" :image="item.image"
							:index="index"></up-lazy-load>
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
						<up-lazy-load threshold="-450" border-radius="10" :image="item.image"
							:index="index"></up-lazy-load>
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

<script>
	import {
		toUrl
	} from '../../utils';
	export default {
		data() {
			return {
				kw: "",
				show: false,
				list3: [
					'https://cdn.uviewui.com/uview/swiper/swiper3.png',
					'https://cdn.uviewui.com/uview/swiper/swiper2.png',
					'https://cdn.uviewui.com/uview/swiper/swiper1.png',
				],
				title: '素胚勾勒出青花，笔锋浓转淡',
				subTitle: '2020-05-15',
				thumb: 'https://img11.360buyimg.com/n7/jfs/t1/94448/29/2734/524808/5dd4cc16E990dfb6b/59c256f85a8c3757.jpg',
				loadStatus: 'loadmore',
				flowList: [],
				list: [{
						price: 35,
						title: '北国风光，千里冰封，万里雪飘',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 75,
						title: '望长城内外，惟余莽莽',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 385,
						title: '大河上下，顿失滔滔',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 784,
						title: '欲与天公试比高',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 7891,
						title: '须晴日，看红装素裹，分外妖娆',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 2341,
						shop: '李白杜甫白居易旗舰店',
						title: '江山如此多娇，引无数英雄竞折腰',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 661,
						shop: '李白杜甫白居易旗舰店',
						title: '惜秦皇汉武，略输文采',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 1654,
						title: '唐宗宋祖，稍逊风骚',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 1678,
						title: '一代天骄，成吉思汗',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 924,
						title: '只识弯弓射大雕',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
					{
						price: 8243,
						title: '俱往矣，数风流人物，还看今朝',
						shop: '李白杜甫白居易旗舰店',
						image: 'https://cdn.uviewui.com/uview/swiper/swiper1.png',
					},
				]
			}
		},
		onLoad() {

		},
		onReachBottom() {
			// 触底执行
			this.loadStatus = 'loading';
			// 模拟数据加载
			setTimeout(() => {
				this.addRandomData();
				this.loadStatus = 'loadmore';
			}, 1000)
		},
		methods: {
			onSearch(val) {
				this.$refs.uToastRef.show({
					message: val,
					type: "success"
				})
			},
			addRandomData() {
				for (let i = 0; i < 10; i++) {
					let index = this.$u.random(0, this.list.length - 1);
					// 先转成字符串再转成对象，避免数组对象引用导致数据混乱
					let item = JSON.parse(JSON.stringify(this.list[index]))
					item.id = this.$u.guid();
					this.flowList.push(item);
				}
			},
			remove(id) {
				this.$refs.uWaterfallRef.remove(id);
			},
			clear() {
				this.$refs.uWaterfallRef.clear();
			},
			// start 主页跳转页面集合
			// 跳转到指定页面
			goToProfile() {
				uni.switchTab({
					url: '/pages/profile/profile'
				});
			},
			goToBirth() {
				uni.navigateTo({
					url: '/pages/birth/birth'
				});
			},
			goToLogin() {
				uni.navigateTo({
					url: "/pages/login/login"
				})
			},
			goToNote() {
				uni.navigateTo({
					url: "/pages/notes/notes"
				})
			},
			goToBill() {
				uni.navigateTo({
					url: "/pages/bill/bill"
				})
			},
			goToTodos() {
				uni.navigateTo({
					url: "/pages/todos/todos"
				})
			},
			goToMessage() {
				uni.navigateTo({
					url: "/pages/message/message"
				})
			}
			// end 主页跳转页面集合


		}
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