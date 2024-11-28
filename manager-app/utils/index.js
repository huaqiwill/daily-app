/**
 * 导航到某页面
 * @param {Object} page
 */
export function goToPage(page) {
	uni.navigateTo({
		page,
	});
}

/**
 * 将时间戳转换为 YYYY-MM-DD 格式的日期字符串
 * @param {number} timestamp - 以毫秒为单位的时间戳
 * @returns {string} 格式化后的日期字符串
 */
export function formatTimestampToDate(timestamp) {
	const date = new Date(timestamp);
	const year = date.getFullYear();
	const month = String(date.getMonth() + 1).padStart(2, '0'); // 月份从 0 开始
	const day = String(date.getDate()).padStart(2, '0');
	return `${year}-${month}-${day}`;
}


export function openWebPage(url) {
	// #ifdef APP-PLUS
	// App端使用plus.webview
	plus.webview.create(url, url, {
		top: '0px',
		bottom: '0px',
		width: '100%',
		height: '100%'
	}).show("pop-in");
	// #endif

	// #ifdef H5
	// H5端使用window.open
	window.open(url, '_blank');
	// #endif

	// #ifdef MP
	// 小程序端使用navigateTo跳转到web-view页面
	uni.navigateTo({
		url: `/pages/webview/webview?url=${encodeURIComponent(url)}`
	});
	// #endif

	// #ifdef WEB
	// Web端（通常是开发阶段在浏览器中）同样使用window.open
	window.open(url, '_blank');
	// #endif
}