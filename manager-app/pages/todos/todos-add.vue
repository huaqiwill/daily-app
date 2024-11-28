<template>
	<view class="container">
		<!-- 注意，如果需要兼容微信小程序，最好通过setRules方法设置rules规则 -->
		<up-form label-width="80" labelPosition="left">
			<up-form-item label="待办名称" borderBottom ref="item1">
				<up-input placeholder="请输入待办名称" v-model="todoInfo.name" border="none"></up-input>
			</up-form-item>
			<up-form-item label="待办描述" borderBottom ref="item1">
				<up-input placeholder="请输入待办描述" v-model="todoInfo.describe" border="none"></up-input>
			</up-form-item>
		</up-form>

		<up-button class="mt-space" type="primary" @click="handleSubmit">保存</up-button>
	</view>
</template>
<script setup>
	import {
		ref,
		reactive
	} from 'vue';
	import {
		apiTodoCreate
	} from '@/utils/api.js'

	const todoInfo = ref({
		name: "",
		describe: ""
	})


	function handleSubmit() {
		console.log(todoInfo.value);
		apiTodoCreate(todoInfo.value).then(res => {
			console.log(res);
			uni.navigateTo({
				url: "/pages/todos/todos"
			})
		})
	}

	// 使用 reactive 创建响应式状态  
	const state = reactive({
		showSex: false,
		model1: {
			userInfo: {
				name: 'uview-plus UI',
				sex: '',
			},
		},
		actions: [{
				name: '男'
			},
			{
				name: '女'
			},
			{
				name: '保密'
			},
		],
		rules: {
			'userInfo.name': {
				type: 'string',
				required: true,
				message: '请填写姓名',
				trigger: ['blur', 'change'],
			},
			'userInfo.sex': {
				type: 'string',
				max: 1,
				required: true,
				message: '请选择男或女',
				trigger: ['blur', 'change'],
			},
		},
		radio: '',
		switchVal: false,
	});

	// 使用 ref 创建响应式引用  
	const formRef = ref(null);

	// 定义方法  
	function sexSelect(e) {
		state.model1.userInfo.sex = e.name;
		if (formRef.value) {
			formRef.value.validateField('userInfo.sex');
		}
	}
</script>
<style>


</style>