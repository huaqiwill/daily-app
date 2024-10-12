<template>
	<view class="">
		<van-calendar v-model:show="show" switch-mode="year-month" />
		<van-form @submit="onSubmit">
			<van-cell-group inset>
				<van-field v-model="username" name="用户名" label="姓名" placeholder="用户名"
					:rules="[{ required: true, message: '请填写用户名' }]" />
				<van-field name="radio" label="性别">
					<template #input>
						<van-radio-group v-model="checked" direction="horizontal">
							<van-radio name="1">男</van-radio>
							<van-radio name="2">女</van-radio>
						</van-radio-group>
					</template>
				</van-field>
		
				<van-field v-model="result" is-link readonly name="calendar" label="出生日期" placeholder="点击出生选择日期"
					@click="showCalendar = true" />
				<van-calendar v-model:show="showCalendar" @confirm="onConfirm" />

				<van-field v-model="password" type="password" name="性别" label="提醒" placeholder="密码"
					:rules="[{ required: true, message: '请填写密码' }]" />
					
				<van-field v-model="password" type="text" name="性别" label="手机" placeholder="请填写手机号"
					:rules="[{ required: true, message: '请填写手机号' }]" />
			</van-cell-group>
			<div style="margin: 16px">
				<van-button round block type="primary" native-type="submit">
					提交
				</van-button>
			</div>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				result: '',
				showCalendar: false,
				show: false,
				searchQuery: "", // 搜索关键词
				newPerson: {
					name: "",
					birthday: "",
				}, // 用于添加新人的对象
				birthdays: [], // 存储所有生日的列表
				filteredBirthdays: [], // 用于显示过滤后的生日列表
			};
		},
		methods: {
			onConfirm(date) {
				result.value = `${date.getMonth() + 1}/${date.getDate()}`;
				showCalendar.value = false;
			},
			// 添加生日
			addBirthday() {
				if (!this.newPerson.name || !this.newPerson.birthday) {
					return uni.showToast({
						title: "请输入姓名和生日",
						icon: "none",
					});
				}

				this.birthdays.push({
					...this.newPerson,
				}); // 添加新生日到数组
				this.newPerson.name = ""; // 清空输入框
				this.newPerson.birthday = "";
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
					this.filteredBirthdays = this.birthdays.filter((person) =>
						person.name.includes(this.searchQuery)
					);
				} else {
					this.filteredBirthdays = [...this.birthdays]; // 显示全部
				}
			},
		},
		mounted() {
			this.filterBirthdays(); // 初始化时显示所有生日
		},
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
</style>