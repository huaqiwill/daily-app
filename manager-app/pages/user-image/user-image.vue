<template>
	<view class="container">
		<!-- 工具栏 -->
		<view style="display: flex;justify-content: space-between;padding: 20rpx;line-height: 80rpx;height: 80rpx;">
			<view class="demo-layout bg-purple-light" style="margin-left: 10rpx;">用户画像</view>
			<u-icon name="plus" size="28" @click="goToAddPage"></u-icon>
		</view>

		<!-- 数据列表 -->
		<up-list @scrolltolower="scrolltolower">
			<up-swipe-action>
				<up-swipe-action-item class="birth-items" :border="false" v-for="(item,index) in indexList" :key="item.id"
					@click="handleDelete(item)" :options="options1" @close="" @open="">
					<up-list-item>
						<up-cell @click="goToDetailPage(item)">
							<template #icon>
								<up-avatar shape="square" size="35" :src="item.url" customStyle="margin: -3px 5px -3px 0"></up-avatar>
							</template>
							<template #title>
								<view class="u-slot-title" style="display: flex;justify-content: space-between;">
									<text class="u-cell-text">{{item.date}}</text>
									<up-tag text="标签" plain size="mini" type="warning">
									</up-tag>
								</view>
							</template>
						</up-cell>
					</up-list-item>
				</up-swipe-action-item>
			</up-swipe-action>
		</up-list>

	</view>
</template>

<script setup>
	import {
		ref,
		reactive
	} from 'vue';
	import {
		onLoad,
		onShow
	} from '@dcloudio/uni-app';
	import {
		apiUserImageList,
		apiUserImageDel
	} from '@/utils/api.js';


	const indexList = ref([]);

	const options1 = [{
		text: "删除",
		style: {
			backgroundColor: '#f56c6c'
		}
	}]



	function handleDelete(item) {
		console.log("刪除")
		console.log(item);
		apiUserImageDel(item.id).then((data) => {
			console.log(data)
			apiUserImageList().then((response) => {
				console.log(response)
				indexList.value = response.data
			})
		})
	}

	function goToAddPage() {
		uni.navigateTo({
			url: "/pages/user-image/user-image-add"
		})
	}

	function goToDetailPage(item) {
		uni.setStorageSync('user-image', {
			data: item
		});
		uni.navigateTo({
			url: "/pages/user-image/user-image-detail"
		})
	}

	onLoad(() => {
		apiUserImageList().then((response) => {
			console.log(response)
			indexList.value = response.data
		})
	});


	function userImageAdd() {

	}

	const scrolltolower = () => {

	};
</script>

<style>
	.container {
		padding: 20rpx;
	}
</style>