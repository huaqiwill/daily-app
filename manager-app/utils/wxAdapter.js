export function wxAdapter(config) {
	console.log(config);
	return new Promise((resolve, reject) => {
		wx.request({
			url: config.baseURL + config.url,
			method: config.method,
			data: config.data,
			header: config.headers,
			success(response) {
				resolve({
					data: response.data,
					status: response.statusCode,
					statusText: response.errMsg,
					headers: response.header,
					config: config,
					request: response
				});
			},
			fail(error) {
				reject(error);
			}
		});
	});
}