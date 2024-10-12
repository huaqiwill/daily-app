<template>
	<view class="container">
		<van-nav-bar title="生日编辑" left-text="返回" @click-left="goBack" right-text="完成" @click-right="onComplete" />

		<van-cell-group>
			<van-field v-model="birthdayInfo.name" label="姓名" placeholder="请输入姓名" readonly />
			<van-field v-model="birthdayInfo.date" label="生日" placeholder="请选择生日" is-link readonly
				@click="showDatePicker" />
			<van-field v-model="birthdayInfo.age" label="年龄" placeholder="请输入年龄" readonly />
			<van-field v-model="birthdayInfo.notes" label="备注" placeholder="请输入备注" readonly />
		</van-cell-group>

		<van-button type="danger" @click="onDelete">删除</van-button>
	</view>
</template>

<script>
	import {
		Toast
	} from 'vant';

	export default {
		data() {
			return {
				birthdayInfo: {
					name: '',
					date: '',
					age: '',
					notes: ''
				}
			};
		},
		methods: {
			goBack() {
				uni.navigateBack();
			},
			onComplete() {
				// 完成操作，比如保存更改
				Toast('完成');
			},
			onDelete() {
				// 删除操作
				Toast('已删除');
				// 在这里可以调用删除 API 或其他逻辑
			},
			showDatePicker() {
				uni.showDatePicker({
					success: (res) => {
						this.birthdayInfo.date = res.date; // 获取选择的日期
						// 计算年龄
						const birthDate = new Date(res.date);
						const age = new Date().getFullYear() - birthDate.getFullYear();
						this.birthdayInfo.age = age;
					}
				});
			}
		},
		onLoad(options) {
			// 假设从上个页面获取生日信息
			if (options) {
				this.birthdayInfo = JSON.parse(options.birthdayInfo);
			}
		}
	};
</script>

<style>
	.container {
		padding: 16px;
	}
</style>