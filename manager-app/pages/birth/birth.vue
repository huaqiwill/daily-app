<template>
	<view class="container">
		<view class="search">
			<van-search v-model="kw" shape="round" background="#fff" placeholder="请输入搜索关键词" />
		</view>
		<van-list v-model="loading" :finished="finished" @load="getBirthdayList">
			<van-cell center="true" class="birth-card" v-for="(birthday, index) in birthdays" :key="index"
				:label="birthday.date" @click="navigateToDetail(birthday.id)">
				<template #icon>
					<image src="../../static/logo.png" alt="icon" class="custom-icon" />
				</template>
				<template #value>
					<div class="custom-value">
						<div>{{ birthday.name }}</div>
						<div>{{ 10 }} 天</div>
					</div>
				</template>
			</van-cell>
			<van-swipe-cell v-for="(birthday, index) in birthdays" :key="index" :label="birthday.date"
				@click="navigateToDetail(birthday.id)">
	<!-- 			<template #left>
					<van-button square type="primary" text="选择" />
				</template> -->
				<van-cell center="true" class="birth-card">
					<template #icon>
						<image src="../../static/logo.png" alt="icon" class="custom-icon" />
					</template>

					<!-- 自定义 value 内容 -->
					<template #value>
						<div class="custom-value">
							<div>{{ birthday.name }}</div> <!-- 第一行：name -->
							<div>{{ 10 }} 天</div> <!-- 第二行：天数 -->
						</div>
					</template>
				</van-cell>
				<template #right>
					<van-button class="del-birth" square type="danger" text="删除" />
					<van-button class="edit-birth" square type="primary" text="收藏" />
				</template>
			</van-swipe-cell>
		</van-list>



		<view class="add_birth" @click="navigateToAddBirthday">+</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				birthdays: [], // 存储生日列表
				loading: false,
				finished: false
			};
		},
		methods: {
			getBirthdayList() {
				this.loading = true;
				// 模拟获取生日数据
				setTimeout(() => {
					this.birthdays = [{
							id: 1,
							name: '张三',
							date: '1990-08-15'
						},
						{
							id: 2,
							name: '李四',
							date: '1992-11-23'
						},
						{
							id: 3,
							name: '李四',
							date: '1992-11-23'
						},
						{
							id: 3,
							name: '李四',
							date: '1992-11-23'
						}
					];
					this.finished = true;
					this.loading = false;
				}, 1000);
			},
			navigateToAddBirthday() {
				uni.navigateTo({
					url: '/pages/birthday-add/birthday-add'
				});
			},
			navigateToDetail(id) {
				uni.navigateTo({
					url: `/pages/birthday-detail/birthday-detail?id=${id}`
				});
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 10rpx 20rpx;

	}

	.birth-card {
		margin-bottom: 20rpx;
		border-radius: 20rpx;
		/* background-color: red; */
		background-color: aliceblue;
	}

	.custom-icon {
		width: 100rpx;
		/* 设置图标宽度 */
		height: 100rpx;
		border-radius: 50%;
		/* 设置图标高度 */
	}

	.add_birth {
		position: fixed;
		right: 30rpx;
		bottom: 50rpx;
		width: 100rpx;
		height: 100rpx;
		border-radius: 50%;
		background-color: bisque;
		text-align: center;
		line-height: 85rpx;
		color: aliceblue;
		font-size: 80rpx;
	}
	.del-birth,
	.edit-birth{
		height: 100%;
	}
</style>