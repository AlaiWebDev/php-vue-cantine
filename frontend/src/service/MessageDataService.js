import axios from 'axios'

const USER_API_URL = 'http://localhost/php-vue-cantine/backend/messages'

class MessageDataService {

    retrieveAllMessages(user_id) {

        return axios.get(`${USER_API_URL}/acknowledge.php`, { params: { user_id: user_id} });
    }
    checkUnreadMessages(user_id) {

        return axios.get(`${USER_API_URL}/read.php`, { params: { user_id: user_id} });
    }

    retrieveMessage(user_email, user_password) {

        return axios.get(`${USER_API_URL}/single_user.php`, { params: { user_email: user_email, user_password: user_password } }, {withCredentials: true});
    }

    deleteMessage(id) {

        return axios.delete(`${USER_API_URL}/delete.php`, { params: { id: id } });
    }

    sendMessage(message) {

        return axios.post(`${USER_API_URL}/send.php`, message);
    }

}

export default new MessageDataService()