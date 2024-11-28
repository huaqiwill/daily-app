<template>
	<view class="container">
		<view class="note-top">
			<view class="note-title">
				<text style="font-weight: bold;">笔记管理</text>
			</view>
			<view @click="goToCreatePage">
				<u-icon name="plus"></u-icon>
			</view>
		</view>
		<view>
			<up-card :sub-title="subTitle" :thumb="thumb">
				<template #body>
					<view class="" slot="body">
						<up-swipe-action>
							<up-swipe-action-item class="birth-items" :border="false" v-for="(item,index) in noteList" :key="item.id"
								@click="onNoteDelete(item)" :options="options1" @close="" @open="">
								<view class="u-body-item u-flex u-border-bottom u-col-between u-p-t-0" @click="onNoteUpdate(item)">
									<image
										src="https://img11.360buyimg.com/n7/jfs/t1/94448/29/2734/524808/5dd4cc16E990dfb6b/59c256f85a8c3757.jpg"
										mode="aspectFill"></image>
									<view style="display: flex;flex-direction: column;margin-left: 20rpx;">
										<view style="font-weight: 800;">{{item.title}}</view>
										<view style="color: #666;" class="u-body-item-title u-line-2">{{item.content}}</view>
									</view>
								</view>
							</up-swipe-action-item>
						</up-swipe-action>
					</view>
				</template>
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

<script setup>
	import {
		reactive,
		ref
	} from 'vue'
	import {
		onLoad
	} from '@dcloudio/uni-app'
	import {
		apiNoteList,
		apiNoteDelete
	} from '@/utils/api.js'

	const options1 = [{
		text: "删除",
		style: {
			backgroundColor: '#f56c6c'
		}
	}]

	const showNote = ref(false)
	const list3 = ref([
		'https://cdn.uviewui.com/uview/swiper/swiper3.png',
		'https://cdn.uviewui.com/uview/swiper/swiper2.png',
		'https://cdn.uviewui.com/uview/swiper/swiper1.png',
	])
	const title = ref('素胚勾勒出青花，笔锋浓转淡')
	const subTitle = ref('2020-05-15')
	const thumb = ref('https://img11.360buyimg.com/n7/jfs/t1/94448/29/2734/524808/5dd4cc16E990dfb6b/59c256f85a8c3757.jpg')
	const NoteList = ref([])
	const Note = reactive({
		id: 1,
		title: "笔记标题",
		subTitle: "2020-05-15",
		content: "笔记内容",
		avatar: "https://cdn.uviewui.com/uview/swiper/swiper3.png"
	})

	const noteList = ref([])

	function getNoteList() {
		apiNoteList().then(res => {
			noteList.value = res.data
			console.log(noteList.value)
		})
	}

	function onNoteDelete(item) {
		apiNoteDelete(item.id).then(res => {
			console.log(res);
			getNoteList()
		})
	}

	function onNoteDetail(item) {
		uni.navigateTo({
			url: "/pages/notes/notes-detail"
		})
	}

	function onNoteUpdate(item) {
		console.log(item)
		uni.setStorageSync("note", {
			data: item
		})
		uni.navigateTo({
			url: "/pages/notes/notes-detail"
		})
	}

	function goToCreatePage() {
		uni.navigateTo({
			url: "/pages/notes/notes-add"
		})
	}

	onLoad(() => {
		getNoteList()
	})


	function addNote() {
		showNote.value = true
	}

	function closeEdit() {
		showNote.value = false
	}

	function saveNote() {
		showNote.value = false
		uToast.show({
			message: "新增成功",
			type: "success"
		})
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