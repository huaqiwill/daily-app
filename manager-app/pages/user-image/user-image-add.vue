<template>
	<view class="container">

		<!-- 日期选择 -->
		<view>
			<up-datetime-picker hasInput :show="show" v-model="value1" mode="date"></up-datetime-picker>
		</view>

		<!-- 图像上传 -->
		<up-upload class="mt-space" :fileList="fileList1" @afterRead="afterRead" @delete="deletePic" name="1" multiple
			:maxCount="10"></up-upload>

		<!-- 提交按钮 -->
		<up-button class="mt-space" @click="handleSubmit" type="primary">提交</up-button>
	</view>
</template>

<script setup>
	import {
		ref
	} from 'vue'
	import {
		formatTimestampToDate
	} from '@/utils/index.js'
	import {
		apiUpload,
		apiUserImageAdd
	} from '@/utils/api.js'

	const userImageData = ref({
		user_id: "1",
		date: "",
		images: ""
	})

	// 提交
	function handleSubmit() {
		userImageData.value.user_id = "1"
		userImageData.value.date = formatTimestampToDate(value1.value)
		userImageData.value.images = fileDownloadImageList.value
		console.log(userImageData.value)
		apiUserImageAdd(userImageData.value).then(res => {
			console.log(res)
			uni.navigateTo({
				url: "/pages/user-image/user-image"
			})
		}).catch(res => {

		})
	}

	// 日期
	const show = ref(false);
	const value1 = ref(Date.now());
	const fileDownloadImageList = ref([])

	// 上传
	const fileList1 = ref([]);

	// 删除图片
	const deletePic = (event) => {
		fileList1.value.splice(event.index, 1);
	};

	// 新增图片
	const afterRead = async (event) => {
		// 当设置 mutiple 为 true 时, file 为数组格式，否则为对象格式
		let lists = [].concat(event.file);
		let fileListLen = fileList1.value.length;
		lists.map((item) => {
			fileList1.value.push({
				...item,
				status: 'uploading',
				message: '上传中',
			});
		});
		for (let i = 0; i < lists.length; i++) {
			console.log(lists[i])
			const result = await apiUpload(lists[i].file);
			console.log(result)
			fileDownloadImageList.value.push(result.data.path)
			let item = fileList1.value[fileListLen];
			fileList1.value.splice(fileListLen, 1, {
				...item,
				status: 'success',
				message: '',
				url: result,
			});
			fileListLen++;
		}
	};
</script>

<style>

</style>