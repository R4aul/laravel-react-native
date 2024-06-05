import axios from 'axios'

const URL_API = 'http://127.0.0.1:8000/api'

export const createProduct = product => axios.post(URL_API+'/products', product)