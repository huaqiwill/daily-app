<template>
	<view class="container">
		<up-input placeholder="请输入标题" border="surround" v-model="noteInfo.title"></up-input>
		<up-textarea class="mt-space" v-model="noteInfo.content" placeholder="请输入内容"></up-textarea>
		<up-button class="mt-space" type="primary" @click="handleSubmit">确定</up-button>
	</view>
</template>
<script setup>
	import {
		reactive,
		ref
	} from 'vue'
	import {
		apiNoteCreate
	} from '@/utils/api.js'

	const noteInfo = reactive({
		user_id: "1",
		content: "",
		title: "",
		date: "2024-11-02"
	})

	const value = ref('');

	// const change = (e) => {
	// 	console.log('change', e);
	// };

	function handleSubmit() {
		console.log(noteInfo);
		apiNoteCreate(noteInfo).then((res) => {
			console.log(res)
			uni.navigateTo({
				url: "/pages/notes/notes"
			})
		})
	}
</script>
<style></style>