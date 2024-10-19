<template>
	<view class="content">
		<up-toast ref="uToastRef"></up-toast>
		<view class="seach-box">
			<u-search @search="onSearch(kw)" class="seach-input" placeholder="日照香炉生紫烟" v-model="kw"
				@custom="onSearch(kw)"></u-search>
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
				bgColor="#ffffff"></up-swiper>
		</view>

		<view>
			<view class="nav">
				<view class="nav-item-box">
					<view class="nav-item nav_profile">
						<image src="../../static/images/user.png" mode=""></image>
					</view>
					<text>用户</text>
				</view>
				<view class="nav-item-box">
					<view class="nav-item nav_birth">
						<image src="../../static/images/public-relations.png" mode=""></image>
					</view>
					<text>关系</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_friends">
						<image src="../../static/images/notes.png" mode=""></image>
					</view>
					<text>笔记</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_friends">
						<image src="../../static/images/invoice.png" mode=""></image>
					</view>
					<text>bill</text>
				</view>

			</view>
			<view class="nav">
				<view class="nav-item-box">
					<view class="nav-item nav_profile">
						<image src="../../static/images/backlog.png" mode=""></image>
					</view>
					<text>待办</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_birth">
						<image src="../../static/images/megaphone.png" mode=""></image>
					</view>
					<text>bill</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_friends">
						<image src="../../static/images/birth.png" mode=""></image>
					</view>
					<text>生日</text>
				</view>

				<view class="nav-item-box">
					<view class="nav-item nav_friends">
						<image src="../../static/images/user.png" mode=""></image>
					</view>
					<text>bill</text>
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
			}
		},
		onLoad() {

		},
		methods: {
			// 跳转到指定页面
			goToProfile() {
				uni.navigateTo({
					url: '/pages/profile/profile'
				});
			},
			goToBirth() {
				uni.navigateTo({
					url: '/pages/birth/birth'
				});
			},
			gotoFriends() {
				uni.navigateTo({
					url: '/pages/friends/friends'
				});
			},
			goToLogin() {
				uni.navigateTo({
					url: "/pages/login/login"
				})
			},
			onSearch(val) {
				this.$refs.uToastRef.show({
					message: val,
					type: "success"
				})
			}
		}
	}
</script>

<style>
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
</style>