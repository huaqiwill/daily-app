<template>
	<view class="container">
		<view>
			<up-notice-bar :text="text1"></up-notice-bar>
			<text>通知</text>
		</view>

	</view>
</template>

<script>
	export default {
		data() {
			return {
				text1: '这是一个用来给用户一些通知的页面'
			}
		},
		methods: {

		}
	}
</script>

<style>

</style>