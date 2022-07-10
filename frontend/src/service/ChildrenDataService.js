import axios from 'axios'

const USER_API_URL = 'http://localhost/php-vue-cantine/backend/children'

class ChildrenDataService {

    retrieveChildren(parent_id) {

        return axios.get(`${USER_API_URL}/read.php`, { params: { parent_id: parent_id} });
    }

}

export default new ChildrenDataService()