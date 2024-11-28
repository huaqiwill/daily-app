<template>
	<view class="container">
		<view class="todos-top">
			<view class="min-avatar">
				<u-avatar src="../../favicon.ico"></u-avatar>
				<!-- <image class="min-avatar-pic" src="../../favicon.ico" mode=""></image> -->
				<text class="todos-title">待办清单</text>
			</view>
			<view class="todos-tool">
				<view class="add-todo" @click="goToTodosAddPage()">
					<u-icon name="plus"></u-icon>
				</view>
				<view class="tip-todo" style="position: relative;">
					<up-badge :showZero="true" :value="num" style="z-index: 99;" :isDot="true" type="error" :absolute="true"
						:offset="[-3,1]">

					</up-badge>
					<u-icon name="bell"></u-icon>
				</view>
				<view class="setting-todo" @click="gotoSettingsPage">
					<u-icon name="setting"></u-icon>
				</view>
			</view>
		</view>


		<view class="all-todo">
			<view class="todo-importance">
				<view class="improtance-title">
					<text>重要任务</text>
				</view>

				<view class="todo-list">
					<up-cell-group>
						<up-cell :title="item.name" label="09:00 AM - 10:00 AM" v-for="item in todoList"
							@click="gotoDetailPage(item)" isLink>
							<template #icon>
								<image src="../../favicon.ico" mode="aspectFit" style="width: 20px; height: 20px;">
								</image>
							</template>
						</up-cell>
					</up-cell-group>

				</view>
			</view>

			<view class="todo-underway">
				<view class="underway-title">
					<text>进行中任务</text>
				</view>

				<view class="todo-list">
					<up-cell-group>
						<up-cell title="编写用户手册" label="09:00 AM - 10:00 AM" isLink>
							<template #icon>
								<image src="../../favicon.ico" mode="aspectFit" style="width: 20px; height: 20px;">
								</image>
							</template>
						</up-cell>
						<up-cell title="设计新产品界面" label="09:00 AM - 10:00 AM" isLink>
							<template #icon>
								<image src="../../favicon.ico" mode="aspectFit" style="width: 20px; height: 20px;">
								</image>
							</template>
						</up-cell>
					</up-cell-group>
				</view>
			</view>

			<view class="todo-done">
				<view class="done-title">
					<text>已完成任务</text>
				</view>

				<view class="todo-list">
					<up-cell-group>
						<up-cell title="提供客户支持" label="09:00 AM - 10:00 AM" isLink>
							<template #icon>
								<image src="../../favicon.ico" mode="aspectFit" style="width: 20px; height: 20px;">
								</image>
							</template>
						</up-cell>
						<up-cell title="会议纪要整理" label="09:00 AM - 10:00 AM" isLink>
							<template #icon>
								<image src="../../favicon.ico" mode="aspectFit" style="width: 20px; height: 20px;">
								</image>
							</template>
						</up-cell>
					</up-cell-group>
				</view>
			</view>
		</view>


		<!-- <u-toast ref="uToast"></u-toast> -->

		<up-popup :show="show" mode="bottom">
			<view>
				<view class="backlogForm" style="height: 800rpx;">
					<up-input type="text" clearable placeholder="请输入待办标题"></up-input>
					<u-textarea></u-textarea>
					<up-datetime-picker hasInput :show="dateShow" v-model="value1" mode="datetime"></up-datetime-picker>
				</view>
				<u-button style="width: 500rpx;" @click="saveBacklog()">保存</u-button>
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
	} from '@dcloudio/uni-app'
	import {
		apiTodoList
	} from '@/utils/api.js'

	const num = 1
	const src = 'http://pic2.sc.chinaz.com/Files/pic/pic9/202002/hpic2119_s.jpg'
	const show = ref(false)
	const dateShow = false
	const dateTime = Date.now()
	const taskList = []
	const task = {
		taskTitle: "",
		taskContent: "",
		taskState: false
	}

	function gotoSettingsPage() {
		uni.navigateTo({
			url: "/pages/todos/settings"
		})
	}

	const todoList = ref([])

	onLoad(() => {
		getTodoList()
	})

	function gotoDetailPage(item) {
		uni.setStorageSync("todo", {
			data: item
		})
		uni.navigateTo({
			url: "/pages/todos/todos-detail"
		})
	}

	function goToTodosAddPage() {
		uni.navigateTo({
			url: "/pages/todos/todos-add"
		})
	}

	function getTodoList() {
		apiTodoList().then(res => {
			todoList.value = res.data
			console.log(todoList.value)
		}).catch(res => {

		})
	}

	function addTask() {
		uni.showToast({
			message: "新增成功",
			type: "success"
		})

		show.value = true
	}

	function saveBacklog() {
		show.value = false
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

	.min-avatar {
		display: flex;
		align-items: center;
	}

	.min-avatar-pic {
		width: 50rpx;
		height: 50rpx;
		border-radius: 50%;
	}

	.todos-title {
		margin-left: 20rpx;
		font-size: 30rpx;
		font-weight: bold;
	}

	.todos-tool {
		width: 150rpx;
		transform: scale(1.2);
		display: flex;
		justify-content: space-evenly;
	}

	.todos-top {
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.all-todo {
		width: 100%;
		height: 500rpx;
		margin-top: 100rpx;
		/* background-color: red; */
	}

	.todo-importance,
	.todo-underway,
	.todo-done {
		margin-bottom: 40rpx;
	}

	.todo-importance .improtance-title,
	.todo-underway .underway-title,
	.todo-done .done-title {
		font-weight: bold;
		margin-bottom: 20rpx;
	}
</style>