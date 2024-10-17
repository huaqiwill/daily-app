<template>
	<view class="container">
		<view class="todos-top">
			<view class="min-avatar">
				<image class="min-avatar-pic" src="../../favicon.ico" mode=""></image>
				<text class="todos-title">待办清单</text>
			</view>
			<view class="todos-tool">
				<view class="add-todo" @click="addTask()">
					<u-icon name="plus"></u-icon>
				</view>
				<view class="tip-todo" style="position: relative;">
					<up-badge showZero="true" :value="num" style="z-index: 99;" :isDot="true" type="error" absolute="false" offset="[1,1]">
						
					</up-badge>
					<u-icon name="bell"></u-icon>
				</view>
				<view class="setting-todo">
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
						<up-cell title="开会讨论新项目" label="09:00 AM - 10:00 AM" isLink>
							<!-- 使用插槽自定义图标 -->
							<template #icon>
								<image src="../../favicon.ico" mode="aspectFit" style="width: 20px; height: 20px;">
								</image>
							</template>
						</up-cell>

						<up-cell title="发送月度报告" label="09:00 AM - 10:00 AM" isLink>
							<!-- 不自定义图标，使用默认配置 -->
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
	
	
		<u-toast ref="uToast"></u-toast>
	</view>
</template>
<script>
export default{
	data(){
		return{
			num:1
		}
	},
	methods:{
		addTask(){
			this.$refs.uToast.show({
				message:"新增成功",
				type:"success"
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