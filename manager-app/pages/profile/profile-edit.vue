<template>
	<view class="container">
		<view class="header">
			<text class="title">编辑个人资料</text>
		</view>

		<view class="form">
			<view class="form-item">
				<van-cell-group inset style="display: flex;height:200rpx;">
					<van-field style="width: 120rpx;" label="头像:" readonly />

					<!-- 上传图片组件 -->
					<van-uploader :after-read="afterRead" :show-upload="false" class="avatar-uploader">
						<!-- 悬停时显示的蒙层和文字 -->
						<view class="avatar-wrapper" @click="triggerUpload">
							<view class="overlay">
								<span class="edit-text">编辑</span>
							</view>
							<image v-if="avatarUrl" :src="avatarUrl" class="avatar"></image>
							<image v-else src="../../static/logo.png" class="avatar"></image>
							<view class="overlay">
								<span class="edit-text">编辑</span>
							</view>
						</view>
					</van-uploader>
				</van-cell-group>


			</view>

			<view class="form-item">
				<van-cell-group inset>
					<van-field label="姓名:" v-model="userInfo.name" placeholder="请输入姓名" />
				</van-cell-group>
			</view>
			<view class="form-item">
				<van-cell-group inset>
					<van-field label="邮箱:" v-model="userInfo.email" placeholder="请输入邮箱" />
				</van-cell-group>
			</view>
			<view class="form-item">
				<van-cell-group inset>
					<van-field label="电话:" v-model="userInfo.phone" placeholder="请输入电话" />
				</van-cell-group>
			</view>
			<view class="form-item">
				<van-cell title="选择生日" is-link @click="showPopup" :value="birthdayText" />

				<!-- 圆角弹窗（底部） -->
				<van-popup v-model:show="show" round position="bottom" :style="{ height: '30%' }">
					<van-date-picker v-model="birthday" type="date" title="选择生日" :min-date="minDate" :max-date="maxDate"
						@confirm="onConfirm" @cancel="onCancel" />
				</van-popup>
			</view>
		</view>
		<van-button class="btn btn-save" type="primary" size="large" @click="saveProfile">保存</van-button>


	</view>
</template>

<script>
	export default {
		data() {
			return {
				userInfo: {
					name: '',
					email: '',
					phone: '',
					birthday: null
				},
				show: false,
				// birthday: null, // 选择的生日日期
				birthdayText: '', // 显示在输入框中的文本
				minDate: new Date(1980, 0, 1), // 最小可选日期
				maxDate: new Date(), // 最大可选日期（今天）
				avatarUrl: "", // 存储上传后的图片URL
			};
		},
		methods: {

			saveProfile() {
				// 保存用户信息的逻辑
				uni.showToast({
					title: '信息已保存',
					icon: 'success'
				});
				uni.navigateBack(); // 返回上一页
			},
			// 确认日期选择
			onConfirm(value) {

				this.show = false; // 关闭弹出层
				this.userInfo.birthday = value; // 记录选择的日期
				this.birthdayText = this.formatDate(value); // 格式化并显示日期
				console.log(this.birthdayText);
			},
			// 取消选择
			onCancel() {
				this.show = false;
			},
			// 格式化日期为 YYYY-MM-DD
			formatDate(date) {

				const year = date.selectedValues[0];
				const month = date.selectedValues[1];
				const day = date.selectedValues[2];
				return `${year}-${month}-${day}`;
			},
			showPopup() {
				this.show = true
			},


			// 模拟点击上传
			triggerUpload() {
				this.$refs.uploadInput.click();
			},

			// 处理文件上传
			onFileChange(event) {
				const file = event.target.files[0];
				if (file) {
					const reader = new FileReader();
					reader.onload = (e) => {
						this.avatarUrl = e.target.result; // 将图片显示在页面上
					};
					reader.readAsDataURL(file);
				}
			},

			// Vant Uploader 的 after-read 回调函数
			afterRead(file) {
				this.avatarUrl = file.content; // 在成功上传后显示图片
			},
		}
	};
</script>

<style scoped>
	.container {
		padding: 0 20px;
	}

	.header {
		padding: 20rpx 0;
	}

	.title {
		font-weight: bold;
		font-size: 40rpx;
	}

	.form {
		border-radius: 5px;
	}

	.form-item {
		margin-top: 30rpx;
	}

	.save-button {
		width: 100%;
		padding: 10px;
		background-color: #007aff;
		color: white;
		border: none;
		border-radius: 5px;
	}

	.avatar {
		width: 200rpx;
		height: 200rpx
	}

	.overlay {
		width: 100%;
		position: absolute;
		z-index: 99;
		text-align: center;
		line-height: 200rpx;
		background-color: rgba(0, 0, 0, .3);
		color: #fff;
		border-radius: 10rpx;
		pointer-events: none;
	}
</style>