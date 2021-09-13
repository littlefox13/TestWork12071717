const axios = require('axios');
const url = 'http://localhost:8000';

class DataService {
  getAll() {
    return axios.get(url+'/api/items');
  }

  get(id) {
    return axios.get(url+`/api/items/${id}`);
  }

  create(data) {
    return axios.post(url+`/api/items`, data);
  }

  update(id, data) {
    return axios.put(url+`/api/items/${id}`, data);
  }

  delete(id) {
    return axios.delete(url+`/api/items/${id}`);
  }
}

export default new DataService();
