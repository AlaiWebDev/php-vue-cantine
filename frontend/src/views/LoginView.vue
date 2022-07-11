<template>
  <div id="container">
			<!-- zone de connexion -->
			<img src="../assets/logo-transparent.png" alt="logo">
      <form @submit="validateAndSubmit">
          <h1>Connexion</h1>
				    <input type="text" name="user_email" v-model="user_email" placeholder="exemple@domaine.com" role="presentation" autocomplete="1234"/>
				    <input type="password" name="new-password" v-model="user_password" id="new-password" autocomplete="new-password" placeholder="Mot de passe"/>
          <input type="submit" value="Connexion" />
          <label>Pas encore inscrit ?</label> 
          <router-link to="/register">Inscription</router-link>
          <div v-if="errors.length">
            <div
              class="alert"
              v-bind:key="index"
              v-for="(error, index) in errors"
            >
              {{ error }}
            </div>
          </div>
          <div v-else
            class="alert"
          >
          </div>
      </form>	
  </div>
</template>
<script>
import UserDataService from "../service/UserDataService";
import MessageDataService from "../service/MessageDataService";
import setCookie from "../mixins/setCookieMixin";
export default {
  name: 'LoginView',
  data() {
    return {
      user_email: "",
      user_password: "",
      errors: [],
      myError: [],
      user: {},
      newMessage: 0
    };
  },
  mixins: [
    setCookie
  ],
  methods: {
    validateAndSubmit(e) {
      e.preventDefault();
      this.errors = [];
      if (!this.user_email) {
        this.errors.push("Merci de renseigner l'e-mail associé à votre compte");
      } else  {
        let regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');
        if (!regex.test(this.user_email)){
          this.errors.push("La forme de l'e-mail est incorrecte");
        }
      }
      if (!this.user_password) {
        this.errors.push("Merci de renseigner le mot de passe associé à votre compte");
      }
      if (this.errors.length === 0) {
          UserDataService.retrieveUser(
            this.user_email,
            this.user_password,
          ).catch(function() {
            let test = document.querySelectorAll(".alert");
            let particularError = document.createElement("p");
            particularError.textContent="Compte introuvable";
            test[0].appendChild(particularError);
            return e;
          }).then((res) => {
            if (res.status == 200) {
                this.user = res.data;
                this.$store.commit('setStatus',true);
                this.setCookie(this.user);
                MessageDataService.checkUnreadMessages(
                  this.user.id
                ).catch(function (err) {
                  throw(err);
                }).then((result) => {
                  if (result.status == 200) {
                    const userMessages = result.data;
                    userMessages.forEach(message => {
                      if (message.acknowledge == 0) {
                        this.newMessage++;
                      }
                      this.$router.push(`/${this.newMessage}`);
                    });
                  }
                });
                
            } else {
                this.$store.commit('setStatus',false);
            }
          });
      }
    },
  }
}
</script>
<style lang="scss" scoped>
  #container{
    width:30%;
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
    /* Formulaire */
    form {
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      width:100%;
      padding: 2rem;
      border: 1px solid #c5d0c6;
      background: #fff;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      input {
        margin: .5rem;
        padding: .3rem;
        border-radius: 9px;
        &::placeholder {
          font-style: italic;
        }
      }
      input[type=submit] {
        width: 100%;
        background-color: #1b595c;
        color: white;
        padding: .8rem 1.2rem;
        margin: .5rem 0;
        border: 1px solid white;
        border-radius: unset;
        cursor: pointer;
        
      }
      input[type=submit]:hover {
        background-color: #154a44;
        color: #fbc522;
        border: 1px solid #fbc522;
      }
      a {
        padding: 1rem;
        margin: auto;
        margin-top: 1rem;
        text-decoration: none;
        background-color: #1b595c;
        border: 1px solid white;
        font-weight: bold;
        color: white;
        &.router-link-exact-active {
          color: #42b983;
        }   
      }
    .alert {
      font-weight: bold;
      color: red;
    }
  }
  a:hover {
        background-color: #154a44;
        color: #fbc522;
        border: 1px solid #fbc522;
    }
}
</style>