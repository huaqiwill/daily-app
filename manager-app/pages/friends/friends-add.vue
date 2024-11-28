<template>
	<view>
		<up-form label-width="150rpx">
			<!-- 姓名编辑框 -->
			<up-form-item label="姓名" prop="name">
				<up-input v-model="formData.name" placeholder="请输入姓名"></up-input>
			</up-form-item>

			<!-- 出生日期选择 -->
			<up-form-item label="出生日期" prop="birth_date">
				<up-datetime-picker hasInput :show="showDateTimePicker" v-model="birthDate"
					mode="date"></up-datetime-picker>
			</up-form-item>

			<!-- 性别选择 -->
			<up-form-item label="性别" prop="sex">
				<up-radio-group v-model="formData.sex">
					<up-radio name="男" label="男"></up-radio>
					<up-radio name="女" label="女"></up-radio>
				</up-radio-group>
			</up-form-item>

			<!-- 生日类型选择 -->
			<up-form-item label="生日类型" prop="status">
				<up-radio-group v-model="formData.status">
					<up-radio name="阴历" label="阴历"></up-radio>
					<up-radio name="农历" label="农历"></up-radio>
				</up-radio-group>
			</up-form-item>

			<!-- 手机号编辑框 -->
			<up-form-item label="手机号" prop="phone">
				<up-input v-model="formData.phone" type="number" placeholder="请输入手机号" maxlength="11">
				</up-input>
			</up-form-item>

			<!-- 头像上传 -->
			<up-form-item label="头像" prop="avatar">
				<up-upload v-model="formData.avatar" :max-count="1" :before-upload="beforeUpload"
					@success="uploadSuccess">
				</up-upload>
			</up-form-item>

			<!-- 保存按钮 -->
			<up-button type="primary" @click="handleSave">保存</up-button>
		</up-form>
	</view>
</template>

<script setup>
	import {
		ref,
		reactive
	} from "vue";
	import {
		apiFriendCreate,
		apiUpload
	} from '@/utils/api.js'
	import {
		formatTimestampToDate
	} from '@/utils/index.js'

	const formData = reactive({
		name: "",
		birth_date: "",
		sex: "男", // 默认值
		status: "阴历", // 默认值
		phone: "",
		avatar: "", // 上传的头像文件数组
	});

	const showDateTimePicker = ref(false)
	const birthDate = ref()

	// 上传前校验
	function beforeUpload(file) {
		if (file.size > 10 * 1024 * 1024) {
			uni.showToast({
				title: "文件不能超过10MB",
				icon: "none"
			});
			return false;
		}
		return true;
	}

	// 上传成功回调
	function uploadSuccess(response, file) {
		formData.avatar = [response.url]; // 保存上传的文件路径
	}

	// 保存操作
	function handleSave() {
		console.log("保存的表单数据：", formData);

		if (!formData.name || !formData.phone || !formData.birth_date) {
			uni.showToast({
				title: "请完整填写表单",
				icon: "none"
			});

			formData.birth_date = formatTimestampToDate(birthDate.value)
			apiFriendCreate(formData).then(res => {
				console.log(res)
				uni.navigateTo({
					url: "/pages/friends/friends"
				})
			}).catch(res => {

			})

			return;
		}
		uni.showToast({
			title: "保存成功",
			icon: "success"
		});
	}
</script>