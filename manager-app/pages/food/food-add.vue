<template>
	<view class="container">

		<up-form labelPosition="left" :model="foodInfo">
			<up-form-item label-width="80" label="添加日期" prop="foodInfo.date" borderBottom>
				<up-datetime-picker hasInput :show="show" v-model="value1" mode="date" />
			</up-form-item>
			<up-form-item label-width="80" label="食物名称" prop="foodInfo.name" borderBottom>
				<up-input v-model="foodInfo.name" border="none" placeholder="请输入食物名称" />
			</up-form-item>
			<up-form-item label-width="80" label="食物类型" prop="foodInfo.type" borderBottom
				@click="showSex = true; hideKeyboard()">
				<up-input v-model="foodInfo.type" disabled disabledColor="#ffffff" placeholder="请选择性别" border="none" />
				<template #right>
					<up-icon name="arrow-right" />
				</template>
			</up-form-item>
		</up-form>

		<up-action-sheet :show="showSex" :actions="foodInfoType" title="请选择食物类型" @close="showSex = false"
			@select="sexSelect" />

		<up-upload :fileList="fileList1" @afterRead="afterRead" @delete="deletePic" name="1" multiple
			:maxCount="10"></up-upload>

		<up-button type="primary" @click="handleSubmit">提交</up-button>
	</view>
</template>

<script setup>
	import {
		ref,
		reactive
	} from 'vue'
	import {
		formatTimestampToDate
	} from '@/utils/index.js'
	import {
		apiUpload,
		apiFoodCreate
	} from '@/utils/api.js'

	const foodInfo = reactive({
		price: 9.1,
		user_id: 1,
		name: '',
		type: 0,
		date: '2003-11-23',
		time: '08:00:00',
		images: []
	})

	function sexSelect(e) {
		foodInfo.type = e.name;
	}

	const showSex = ref(true)
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
		console.log(value1.value)
		foodInfo.date = formatTimestampToDate(value1.value)
		console.log(foodInfo)
		apiFoodCreate(foodInfo).then(data => {
			console.log(data)
			uni.navigateTo({
				url: "/pages/food/food"
			})
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