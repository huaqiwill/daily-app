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
		ref,
		toRef
	} from 'vue'
	import {
		onLoad
	} from '@dcloudio/uni-app'
	import {
		apiNoteUpdate
	} from '@/utils/api.js'

	const noteInfo = ref({
		id: '1',
		user_id: "1",
		content: "",
		title: "",
		date: "2024-11-02"
	})

	onLoad(async () => {
		const data = await uni.getStorageSync("note")
		if (data) {
			console.log(data)
			noteInfo.value = data.data
		}
	})

	function handleSubmit() {
		console.log(noteInfo.value);
		apiNoteUpdate(noteInfo.value).then((res) => {
			console.log(res)
			uni.navigateTo({
				url: "/pages/notes/notes"
			})
		})
	}
</script>
<style>

</style>