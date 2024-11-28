<template>
	<view>
		<view class="seach-box">
			<u-search @search="onSearch(kw)" class="seach-input" placeholder="日照香炉生紫烟" v-model="kw" @custom="onSearch(kw)"
				bgColor="#fff"></u-search>
		</view>
		<view>
			历史搜索
			<view>你好</view>
			<view>你好</view>
			<view>你好</view>
			<view>你好</view>
		</view>
	</view>
</template>

<script setup>
	import {
		ref
	} from 'vue'

	const kw = ref('');

	function onSearch() {


	}
</script>

<style>

</style>