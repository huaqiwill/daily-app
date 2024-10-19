import requests from "./requests";

// test api
export const getData = () => requests({
	method: "get",
	url: "/data"
})

// login
export const login = (data) => requests({
	method: "post",
	url: "/login",
	data
})

// register
export const register = (data) => requests({
	method: "post",
	url: "/register",
	data
})

// get user data 
export const getUserInfo = () => requests({
	method: "get",
	url: "/user/info",
})

// get relation manager list or single
export const getRelation = (id = null) => {
	const url = id ? `/relation/${id}` : "/relation/list"
	return requests({
		method: "get",
		url
	})
}

// add relation 
export const addRelation = (data) => requests({
	method: "post",
	url: "/relation/add",
	data
})

// update relation

export const updateRelation = (data) => requests({
	method: "post",
	url: "/relation/update",
	data
})

// save profile
export const saveProfileInfo = (data) => requests({
	method: "post",
	url: "/profile/save"
})


// birth modules
export const addBirth = (data) => requests({
	method: "post",
	url: "/birth/add"
})

export const getBirthList = () => requests({
	method: "get",
	url: "/birth/list"
})

export const getBirth = (id) => requests({
	method: "get",
	url: `/birth?id=${id}`
})