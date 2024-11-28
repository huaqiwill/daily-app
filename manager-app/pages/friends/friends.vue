<template>
	<view class="container">
		<view class="birth-top">
			<view class="birth-title">
				<text>关系管理</text>
			</view>
			<view class="add-icon" @click="addBirth()">
				<u-icon name="plus"></u-icon>
			</view>
		</view>

		<view class="birth-content">
			<view class="title">
				<text>关系管理</text>
			</view>
			<view class="birth-list">
				<up-swipe-action>
					<up-swipe-action-item class="birth-items" :border="false" v-for="(item,index) in friendList"
						:key="item.id" @click="delBirth(item)" :options="options1" @close="" @open="">
						<u-cell-group :border="false">
							<u-cell style="border-radius: 15rpx 0rpx 0rpx 15rpx;
		transition: all 0.5s;" @click="editBirth(item)" class="birth-item" :border="false" :title="item.name"
								:label="item.birth_date">
							</u-cell>
						</u-cell-group>
					</up-swipe-action-item>
				</up-swipe-action>
			</view>
		</view>
		<u-toast ref="uToast"></u-toast>

		<up-popup :show="addBrithShow" mode="bottom">
			<view>
				<view class="backlogForm" style="height: 800rpx;">
					<up-input v-model="birthData.name" type="text" clearable placeholder="请输入待办标题"></up-input>
					<u-textarea></u-textarea>
					<up-datetime-picker hasInput :show="dateShow" v-model="birthData.date"
						mode="date"></up-datetime-picker>
				</view>
				<u-button style="width: 500rpx;" @click="saveBirth()">保存</u-button>
			</view>
		</up-popup>

	</view>
</template>
<script setup>
	import {
		ref
	} from 'vue'
	import {
		onLoad
	} from "@dcloudio/uni-app"
	import {
		apiFriendList,
		apiFriendDelete
	} from '@/utils/api.js'

	const dateShow = false
	const addBrithShow = false

	const birthData = {
		name: "",
		date: formatTimestamp(Number(new Date())),
		ishow: false
	}

	const options1 = [{
		text: "删除",
		style: {
			backgroundColor: '#f56c6c'
		}
	}]

	const friendList = ref([])

	function getFriendList() {
		apiFriendList().then(res => {
			friendList.value = res.data
			console.log(friendList.value)
		})
	}

	onLoad(() => {
		console.log("页面加载");
		getFriendList()
	})

	function formatTimestamp(timestamp) {
		const date = new Date(timestamp);
		const year = date.getFullYear();
		const month = String(date.getMonth() + 1).padStart(2, '0'); // 月份从 0 开始
		const day = String(date.getDate()).padStart(2, '0');
		return `${year}-${month}-${day}`;
	}

	function addBirth() {
		uni.navigateTo({
			url: "/pages/friends/friends-add"
		})
	}


	function delBirth(item) {
		console.log(item.id)
		apiFriendDelete(item.id).then(e => {
			console.log(e)
			getFriendList()
		}).catch(e => {

		})
	}

	function editBirth(item) {
		uni.setStorageSync('friend', {
			data: item
		})
		uni.navigateTo({
			url: "/pages/friends/friends-edit"
		})
	}
</script>
<style scoped lang="scss">
	@charset "UTF-8";

	.container {
		padding: 30rpx 30rpx;
		background-color: #f5f5f5;
		/* 设置背景颜色 */
		height: 100%;
		/* 确保填充整个页面 */
		min-height: 100vh;
		/* 确保在小屏幕设备上依然填充整个页面 */
	}

	.birth-top {
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.birth-top .birth-title {
		font-size: 40rpx;
		font-weight: bold;
	}

	.birth-content {
		margin-top: 30rpx;
	}

	.birth-content .title {
		margin-bottom: 30rpx;
	}

	.birth-content .birth-item {
		border-radius: 15rpx 0rpx 0rpx 15rpx;
		// transition: all 0.5s;
	}

	.birth-content .birth-items {
		border-radius: 15rpx;
		margin-bottom: 20rpx;
		// transition: all 0.5s;
		overflow: hidden;
	}

	.birth-content .birth-item:hover {
		background-color: #ddeafc;
		border: none;
	}
</style>