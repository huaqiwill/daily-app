<template>
	<view class="container">
		<van-form @submit="onSubmit">
			<van-field v-model="name" label="姓名" placeholder="请输入姓名" required />
			<van-field v-model="date" label="生日日期" placeholder="请选择日期" is-link @click="showDatePicker" required />
			<van-popup v-model="showPicker" position="bottom">
				<van-datetime-picker type="date" v-model="date" @confirm="onDateConfirm" @cancel="onPickerCancel" />
			</van-popup>
			<van-button type="primary" block round native-type="submit">更新生日</van-button>
		</van-form>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				name: '',
				date: '',
				showPicker: false,
				id: null
			};
		},
		onLoad(options) {
			// 模拟获取生日详情
			const birthday = {
				id: options.id,
				name: '李四',
				date: '1992-11-23'
			};
			this.name = birthday.name;
			this.date = birthday.date;
			this.id = birthday.id;
		},
		methods: {
			showDatePicker() {
				this.showPicker = true;
			},
			onDateConfirm(value) {
				this.date = value;
				this.showPicker = false;
			},
			onPickerCancel() {
				this.showPicker = false;
			},
			onSubmit() {
				if (!this.name || !this.date) {
					uni.showToast({
						title: '请填写完整信息',
						icon: 'none'
					});
					return;
				}
				// 模拟更新生日逻辑
				uni.showToast({
					title: '更新成功',
					icon: 'success'
				});
				setTimeout(() => {
					uni.navigateBack();
				}, 1000);
			}
		}
	};
</script>

<style scoped>
	.container {
		padding: 20px;
	}
</style>