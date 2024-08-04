import axios from 'axios';

const Axios = axios.create({
    baseURL: '/',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    withCredentials: true,
});

Axios.interceptors.request.use((config) => {
    return config;
}, (error) => {
    return Promise.reject(error);
});

Axios.interceptors.response.use((response) => {
    return response;
}, (error) => {
    if (error.response.status === 401) {
        window.location.href = '/login';
    }
    return Promise.reject(error);
});

export default Axios;
