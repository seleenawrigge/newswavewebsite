import axios from "axios";

const createAxiosInstance = () => {
    return axios.create({
      baseURL: 'https://effectivetours.com/api/',
      timeout: 10000,
      headers: {
        'Content-Type': 'application/json',
      }
    });
  };
  
  export default createAxiosInstance();