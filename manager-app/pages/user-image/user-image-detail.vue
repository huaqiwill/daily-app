<template>
	<view class="container">
		<view>日期：{{userImage.date}}</view>
		<up-image class="mt-space" :show-loading="true" :src="userImage.url" width="80px" height="80px"
			@click="click"></up-image>

		<button class="mt-space" @click="goToEditPage">编辑</button>
		<button class="mt-space" @click="goToBack">返回</button>
	</view>
</template>

<script setup>
	import {
		ref
	} from 'vue'
	import {
		onLoad,
		onShow
	} from '@dcloudio/uni-app';

	const click = () => {
		// 点击事件处理逻辑
	};

	const userImage = ref()

	onLoad(() => {
		const data = uni.getStorageSync('user-image');
		if (data) {
			console.log(data);
			userImage.value = data.data
		}
	})

	function goToBack() {
		uni.navigateBack()
	}

	function goToEditPage() {
		uni.navigateTo({
			url: "/pages/user-image/user-image-edit"
		})
	}
</script>

<style>

</style>