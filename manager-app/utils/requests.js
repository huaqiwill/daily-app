import axios from "axios"

const requests = axios.create({
	baseURL: "http://localhost:8080/",
	timeout: 5000
})

requests.interceptors.request.use((config) => {
	// get authentication
	const authentication = "test"
	config.headers = {
		authentication
	}

	return config;
}, (err) => {
	return Promise.reject(err)
})

requests.interceptors.response.use((data) => {
	return data.data
}, (err) => {
	return Promise.reject(err)
})

export default requests