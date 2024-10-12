<template>
	<view class="container">
		<!-- 搜索框 -->
		<label for="">
			姓名
		</label>
		<input v-model="searchQuery" placeholder="搜索姓名" @input="filterBirthdays" />

		<!-- 生日列表 -->
		<view class="card mt-2" @click="birthDetailPage()">
			<view class="list-item">
				<text>张三 - 2003.11.33</text>
				<button @click="removeBirthday(index)" class="delete-btn">删除</button>
			</view>
		</view>
		<view class="card mt-2">
			<view class="list-item">
				<text>李四 - 2003.11.33</text>
				<button @click="removeBirthday(index)" class="delete-btn">删除</button>
			</view>
		</view>

		<view class="list">
			<view v-for="(person, index) in filteredBirthdays" :key="index" class="list-item">
				<text>{{ person.name }} - {{ person.birthday }}</text>
				<button @click="removeBirthday(index)" class="delete-btn">删除</button>
			</view>
		</view>

		<!-- 添加图标 -->
		<view class="add-icon" @click="addBirthPage">
			<uni-icon name="add" size="40" color="#007aff"></uni-icon>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				searchQuery: '', // 搜索关键词
				newPerson: {
					name: '',
					birthday: ''
				}, // 用于添加新人的对象
				birthdays: [], // 存储所有生日的列表
				filteredBirthdays: [] // 用于显示过滤后的生日列表
			};
		},
		methods: {
			// 添加生日
			addBirthday() {
				if (!this.newPerson.name || !this.newPerson.birthday) {
					return uni.showToast({
						title: '请输入姓名和生日',
						icon: 'none'
					});
				}

				this.birthdays.push({
					...this.newPerson
				}); // 添加新生日到数组
				this.newPerson.name = ''; // 清空输入框
				this.newPerson.birthday = '';
				this.filterBirthdays(); // 更新显示的列表
			},

			// 删除生日
			removeBirthday(index) {
				this.birthdays.splice(index, 1); // 删除指定索引的生日
				this.filterBirthdays(); // 更新显示的列表
			},

			// 搜索生日
			filterBirthdays() {
				if (this.searchQuery) {
					this.filteredBirthdays = this.birthdays.filter(person =>
						person.name.includes(this.searchQuery)
					);
				} else {
					this.filteredBirthdays = [...this.birthdays]; // 显示全部
				}
			},
			addBirthPage() {
				uni.navigateTo({
					url: '/pages/birth/birth-add'
				})
			},
			birthDetailPage() {
				uni.navigateTo({
					url: '/pages/birth/birth-detail'
				})
			}
		},
		mounted() {
			this.filterBirthdays(); // 初始化时显示所有生日
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
	}

	.search-box {
		width: 100%;
		padding: 10px;
		margin-bottom: 20px;
		border: 1px solid #ddd;
		border-radius: 5px;
	}

	.form {
		display: flex;
		flex-direction: column;
		margin-bottom: 20px;
	}

	.input {
		width: 100%;
		height: 45px;
		margin-bottom: 10px;
		padding: 0 15px;
		border: 1px solid #ddd;
		border-radius: 5px;
		font-size: 16px;
	}

	.btn {
		width: 100%;
		height: 45px;
		background-color: #007aff;
		color: white;
		border: none;
		border-radius: 5px;
		text-align: center;
		line-height: 45px;
		font-size: 16px;
	}

	.list {
		margin-top: 20px;
	}

	.list-item {
		display: flex;
		justify-content: space-between;
		padding: 10px;
		background-color: #f7f7f7;
		border-bottom: 1px solid #ddd;
	}

	.delete-btn {
		background-color: red;
		color: white;
		border: none;
		padding: 5px 10px;
		border-radius: 5px;
		font-size: 12px;
	}

	/* 添加图标的样式 */
	.add-icon {
		position: fixed;
		right: 20px;
		bottom: 20px;
		width: 50px;
		height: 50px;
		border-radius: 50%;
		background-color: #007aff;
		display: flex;
		justify-content: center;
		align-items: center;
		color: white;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
	}
</style>