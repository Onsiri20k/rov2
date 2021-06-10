const axios = window.axios;

const BASE_APP_URL = 'http://test.esports.rov.in.th/api'

export default {
    getAllPosts: () =>
        axios.get(`${BASE_APP_URL}/items`),
    getOnePost: (id) =>
        axios.get(`${BASE_APP_URL}/items/${id}/edit`),
    addPost: (item) =>
        axios.post(`${BASE_APP_URL}/items`, item),
    updatePost: (item, id) =>
        axios.put(`${BASE_APP_URL}/items/${id}`, item),
    deletePost: (id) =>
        axios.delete(`${BASE_APP_URL}/items/${id}`),
}