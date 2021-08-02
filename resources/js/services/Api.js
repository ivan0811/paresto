import axios from 'axios'

export default () => {  
    const token = JSON.parse(localStorage.getItem('user')).bearer_token    
    const axiosInstance = axios.create({        
        baseURL: `/api`,
        headers: { 'Authorization': `Bearer ${token}` }        
    })
        

  axiosInstance.interceptors.response.use(
    (response) => response,
    (error) => {
      if (error.response.status === 401) {        
        localStorage.removeItem('user')        
      }
      return Promise.reject(error)
    }
  )

  return axiosInstance
}
