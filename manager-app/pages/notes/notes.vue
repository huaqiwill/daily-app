<template>
	<view class="container">
		<view class="note-top">
			<view class="note-title">
				<text style="font-weight: bold;">笔记管理</text>
			</view>
			<view @click="addNote()">
				<u-icon name="plus"></u-icon>
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
				<!-- 				<template #foot>
					<view>
						<up-icon name="chat-fill" size="34" color="" label="30评论"></up-icon>
					</view>
				</template> -->
			</up-card>
		</view>
		<u-popup :show="showNote">
			<view style="display: flex;justify-content: space-between;padding: 0 30rpx;">
				<text>hello新增笔记</text>
				<u-icon name="close" @click="closeEdit()"></u-icon>
			</view>
			<view style="display: flex;justify-content: space-between;padding: 0 30rpx;">
				<u-button type="primary" @click="saveNote()">save</u-button>
			</view>
		</u-popup>
		<u-toast ref="uToast"></u-toast>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				showNote: false,
				list3: [
					'https://cdn.uviewui.com/uview/swiper/swiper3.png',
					'https://cdn.uviewui.com/uview/swiper/swiper2.png',
					'https://cdn.uviewui.com/uview/swiper/swiper1.png',
				],
				title: '素胚勾勒出青花，笔锋浓转淡',
				subTitle: '2020-05-15',
				thumb: 'https://img11.360buyimg.com/n7/jfs/t1/94448/29/2734/524808/5dd4cc16E990dfb6b/59c256f85a8c3757.jpg',
				NoteList: [],
				Note: {
					id: 1,
					title: "笔记标题",
					subTitle: "2020-05-15",
					content: "笔记内容",
					avatar: "https://cdn.uviewui.com/uview/swiper/swiper3.png"
				}
			}
		},
		onLoad() {

		},
		methods: {
			addNote() {
				this.showNote = true
			},
			closeEdit() {
				this.showNote = false
			},
			saveNote() {
				this.showNote = false
				this.$refs.uToast.show({
					message: "新增成功",
					type: "success"
				})
			}
		}
	}
</script>
<style scoped>
	.container {
		padding: 30rpx 30rpx;
		background-color: #f5f5f5;
		/* 设置背景颜色 */
		height: 100%;
		/* 确保填充整个页面 */
		min-height: 100vh;
		/* 确保在小屏幕设备上依然填充整个页面 */
	}

	.note-top {
		display: flex;
		align-items: center;
		justify-content: space-between;
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