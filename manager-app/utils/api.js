import requests from "./requests";

// 测试接口
export const apiTest = () => {
	return requests({
		method: "get",
		url: "/test",
	})
}

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

/* 文件 */

export const apiUpload = (file) => {
	// 创建 FormData 对象
	const formData = new FormData();
	formData.append('file', file);

	return requests({
		method: 'post',
		url: '/upload',
		data: formData,
		// headers: {
		// 	'Content-Type': 'multipart/form-data' // 单独设置 Content-Type
		// }
	})
}

export const apiDownload = (path) => {
	return requests({
		method: 'get',
		url: '/download' + path
	})
}

/* 用户画像 */

export const apiUserImageList = () => {
	return requests({
		method: 'get',
		url: '/userImage/list'
	})
}

export const apiUserImageGet = (id) => {
	return requests({
		method: 'get',
		url: '/userImage/' + id
	})
}

export const apiUserImageAdd = (data) => {
	return requests({
		method: 'post',
		url: '/userImage/add',
		data
	})
}

export const apiUserImageEdit = (data) => {
	return requests({
		method: 'post',
		url: '/userImage/edit/' + data.id,
		data
	})
}

export const apiUserImageDel = (id) => {
	return requests({
		method: 'delete',
		url: '/userImage/' + id
	})
}

/* 饮食 */

export const apiFoodList = () => {
	return requests({
		method: "get",
		url: "/food/list"
	})
}

export const apiFoodDetail = (id) => {
	return requests({
		method: "get",
		url: "/food/" + id
	})
}

export const apiFoodCreate = (data) => {
	return requests({
		method: "post",
		url: "/food/add",
		data
	})
}

export const apiFoodDelete = (id) => {
	return requests({
		method: "delete",
		url: "/food/" + id
	})
}

export const apiFoodUpdate = (id, data) => {
	return requests({
		method: "post",
		url: "/food/" + id,
		data
	})
}

/* 笔记 */

export const apiNoteList = (queryParams) => {
	return requests({
		method: "get",
		url: "/note/list",
		params: queryParams
	})
}

export const apiNoteCreate = (data) => {
	return requests({
		method: "post",
		url: "/note/add",
		data
	})
}

export const apiNoteDelete = (id) => {
	return requests({
		method: "delete",
		url: "/note/" + id,
	})
}

export const apiNoteDetail = (id) => {
	return requests({
		method: "get",
		url: "/note/" + id,
	})
}

export const apiNoteUpdate = (data) => {
	return requests({
		method: "post",
		url: "/note/edit/" + data.id,
		data
	})
}

/* 关系 */

export const apiFriendList = (queryParams) => {
	return requests({
		method: "get",
		url: "/friend/list",
		params: queryParams
	})
}

export const apiFriendCreate = (data) => {
	return requests({
		method: "post",
		url: "/friend/add",
		data
	})
}

export const apiFriendUpdate = (data) => {
	return requests({
		method: "post",
		url: "/friend/edit/" + data.id,
		data
	})
}

export const apiFriendDetail = (id) => {
	return requests({
		method: "get",
		url: "/friend/" + id,
	})
}

export const apiFriendDelete = (id) => {
	return requests({
		method: "delete",
		url: "/friend/" + id,
	})
}


/* 待办 */

export const apiTodoCreate = (data) => {
	return requests({
		method: "post",
		url: "/todo/add",
		data
	})
}

export const apiTodoUpdate = (data) => {
	return requests({
		method: "delete",
		url: "/todo/" + data.id,
		data
	})
}

export const apiTodoDelete = (id) => {
	return requests({
		method: "delete",
		url: "/todo/" + id,
	})
}

export const apiTodoList = (qeuryParams) => {
	return requests({
		method: "get",
		url: "/todo/list",
		params: qeuryParams
	})
}

export const apiTodoDetail = (id) => {
	return requests({
		method: "get",
		url: "/todo/" + id,
	})
}

/* 账单 */

export const apiBillCreate = (data) => {
	return requests({
		method: "post",
		url: "/bill/add",
		data
	})
}

export const apiBillUpdate = (data) => {
	return requests({
		method: "post",
		url: "/bill/edit",
		data
	})
}

export const apiBillDelete = (id) => {
	return requests({
		method: "delete",
		url: "/bill/" + id,
	})
}


export const apiBillList = (queryParams) => {
	return requests({
		method: "get",
		url: "/bill/list",
		params: queryParams
	})
}

export const apiBillDetail = (id) => {
	return requests({
		method: "get",
		url: "/bill/" + id,
	})
}