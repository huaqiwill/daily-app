<template>
	<view>
		<u-tabbar :value="value1" @change="change1" :fixed="true" :placeholder="false" :safeAreaInsetBottom="true">
			<up-tabbar-item text="首页" icon="home" @click="click1"></up-tabbar-item>
			<up-tabbar-item text="添加" icon="photo" @click="goToAdd()"></up-tabbar-item>
			<up-tabbar-item text="直播" icon="play-right" @click="click1"></up-tabbar-item>
			<up-tabbar-item text="我的" icon="account" @click="click1"></up-tabbar-item>
		</u-tabbar>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				data: 6
			}
		},
		methods:{
			goToAdd(){
				uni.navigateTo({
					url:"/pages/add/add"
				})
			}
		}
	}
</script>
<style>

</style>