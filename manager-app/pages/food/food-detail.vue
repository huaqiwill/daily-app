<template>
	<view class="container">

		<view>
			<view>添加日期：{{foodInfo.date}}</view>
			<view>食物名称：{{foodInfo.name}}</view>
			<view>食物类型：{{foodInfo.type}}</view>
			<up-image :show-loading="true" :src="item" v-for="item in foodInfo.images" width="80px" height="80px"></up-image>
		</view>

		<up-button type="primary" @click="handleReturn">返回</up-button>
		<up-button class="mt-space" type="primary" @click="handleSubmit">编辑</up-button>
	</view>
</template>

<script setup>
	import {
		ref,
		reactive
	} from 'vue'
	import {
		onLoad
	} from '@dcloudio/uni-app'
	import {
		formatTimestampToDate
	} from '@/utils/index.js'
	import {
		apiUpload,
		apiFoodCreate
	} from '@/utils/api.js'

	const foodInfo = ref({
		price: 9.1,
		user_id: 1,
		name: '',
		type: 0,
		date: '2003-11-23',
		time: '08:00:00',
		images: []
	})

	onLoad(async () => {
		const data = await uni.getStorageSync("food")
		if (data) {
			console.log(data)
			foodInfo.value = data.data
		}
	})

	function handleReturn() {
		uni.navigateBack()
	}

	function sexSelect(e) {
		foodInfo.type = e.name;
	}

	const showSex = ref(false)
	const value = ref('');
	const foodInfoType = [{
		name: '早餐',
		value: 1,
	}, {
		name: '中餐',
		value: 2,
	}, {
		name: '晚餐',
		value: 3,
	}, {
		name: '夜宵',
		value: 4,
	}, {
		name: '聚餐',
		value: 5
	}, {
		name: '其他',
		value: 6
	}]

	const change = (e) => {
		console.log('change', e);
	};

	// 提交
	function handleSubmit() {
		uni.navigateTo({
			url: "/pages/food/food-edit"
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
			foodInfo.images.push(result.data.path)
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

<style scoped lang="scss">

</style>