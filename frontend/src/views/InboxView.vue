<template>
  <div id="container">
			<!-- zone de connexion -->
			<img src="../assets/logo-transparent.png" alt="logo">	
      <div class="messages" v-for="message in messages">
          <p v-if="message.user_profile == 0" class="text-admin">
            {{ message.message }}
            </p>
          <p v-else class="text-user">
            {{ message.message }}
          </p>
      </div>
      <div class="reponse" v-if="isActive">
          <textarea name="text_message" v-model="userMessage" cols="50" rows="10" onfocus="this.value=''"></textarea>
          <input type="button" value="Envoyer" id="btn_envoyer" @click="sendingMessage">
      </div>
      <input type="button" :value="isActive ? 'Annuler' : 'Répondre'" @click="isActive=!isActive">
  </div>
</template>

<script>
import getCookie from '@/mixins/getCookiesMixin';
import MessageDataService from "../service/MessageDataService";
export default {
  name: 'InboxView',
  data: function () {
    return {
      messages: [],
      isActive: true,
      userId: "",
      userProfile: null,
      userMessage: "Tapez votre message…"
    }
  },
  methods: {
    sendingMessage () {
      MessageDataService.sendMessage({
            user_id: this.userId,
            user_profile: this.userProfile,
            user_message: this.userMessage
            }).then(() => {
            this.$router.push("/inbox");
          });
    }
  },
  mixins: [
    getCookie
  ],
  beforeMount() {
    this.userId = this.getCookie("UserID");
    this.userProfile = this.getCookie("UserLevel");
    if (this.getCookie("UserName")) {
        MessageDataService.retrieveAllMessages(
            this.getCookie("UserID"),
          ).catch(function(e) {
            return e;
          }).then((res) => {
            if (res.status == 200) {
                this.messages = res.data;
            }
          });
      }
  }
}
</script>
<style lang="scss">
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
  #container {
    width:40%;
    margin: 11rem auto;
    padding: 2rem;
    border: 1px solid #f1f1f1;
    background: #fff;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    img {
      display: block;
      width: 20%;
      margin: auto;
    }
    .messages {
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      width:98%;
      padding-top: .5rem;
      margin: auto;
      border: 1px solid #c5d0c6;
      background: #fff;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      p {
        width: 50%;
        
      }
      .text-admin {
        color: blue;
        margin-left: 0;
      }
      .text-user {
        color: green;
        font-style: italic;
        margin-left: 50%;
      }
    }
    .reponse {
      display: flex;
    }
    textarea {
      margin: .5rem;
      resize: none;
    }
    #btn_envoyer {
        width: 30%;
        height: 20%;
        align-self: center;
        background-color: #1b595c;
        color: white;
        padding: .8rem 1.2rem;
        margin: .5rem 0;
        border: 1px solid white;
        border-radius: unset;
        cursor: pointer;
    }
    input[type=button] {
        width: 100%;
        background-color: #1b595c;
        color: white;
        padding: .8rem 1.2rem;
        margin: .5rem 0;
        border: 1px solid white;
        border-radius: unset;
        cursor: pointer;
      }
      input[type=button]:hover {
        background-color: #154a44;
        color: #fbc522;
        border: 1px solid #fbc522;
      }
  }
</style>
