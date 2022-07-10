<template>
  <div id="container">
		<img src="../assets/logo-transparent.png" alt="logo">
			
			<form @submit="validateAndSubmit" id="register_form">
				<h1>Inscription</h1>
				<div class="label">Nom</div>
				<input type="text" name="user-name" v-model="user_name"/>
				<div class="label">E-mail</div>
				<input type="text" name="user_email" v-model="user_email"/>
        <div class="label">Téléphone</div>
				<input type="text" name="user_phone" v-model="user_phone"/>
				<div class="label">Rue</div>
				<input type="text" name="user_street" v-model="user_street"/>
				<div class="label">Ville</div>
				<input type="text" name="user_city" v-model="user_city"/>
				<div class="label">Code postal</div>
				<input type="text" name="user_zipcode" v-model="user_zipcode"/>
				<div class="label">Mot de passe</div>
				<input type="password" name="new-password" v-model="user_password" id="new-password" autocomplete="new-password"/>
				<div class="label">Confirmation du mot de passe</div>
				<input type="password" name="repass" v-model="user_repassword"/>
				<input type="submit" name="valider" value="Valider" />
				Déja inscrit ?
				<router-link to="/login">Connexion</router-link>
        <div v-if="errors.length">
            <div
              class="alert alert-danger"
              v-bind:key="index"
              v-for="(error, index) in errors"
            >
              {{ error }}
            </div>
          </div>
			</form>
		</div>
</template>

<script>
import UserDataService from "../service/UserDataService";
export default {
  name: 'RegisterView',
  data() {
    return {
      user_name: "",
      user_email: "",
      user_password: "",
      user_repassword: "",
      user_phone: "",
      user_street: "",
      user_city: "",
      user_zipcode: "",
      errors: [],
    };
  },
  computed: {
    id() {
      return this.$route.params.id;
    },
  },
  methods: {
    validateAndSubmit(e) {
      e.preventDefault();
      this.errors = [];
      const form = document.getElementById('register_form');
      let oneEmpty = false;
      Array.from(form.elements).forEach((input) => {
        if (input.value === "") {
          oneEmpty = true;
        }
      });
      if (oneEmpty) {
        this.errors.push("Tous les champs sont obligatoires");
      } else {
        if (this.user_password != this.user_repassword) {
          this.errors.push("Les 2 mots de passe ne sont pas identiques");
        }
      }
      if (this.errors.length === 0) {
          UserDataService.createUser({
            user_name: this.user_name,
            user_email: this.user_email,
            user_password: this.user_password,
            user_repassword: this.user_repassword,
            user_phone: this.user_phone,
            user_street: this.user_street,
            user_city: this.user_city,
            user_zipcode: this.user_zipcode,
            user_profile: 2
          }).then(() => {
            this.$router.push("/login");
          });
      }
    },
  }
}
</script>
<style lang="scss" scoped>
  #container{
    width:30%;
    margin: .4rem auto;
    padding: 1.5rem;
    border: 1px solid #f1f1f1;
    background: #fff;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    img {
      display: block;
      width: 10%;
      margin: auto;
    }
    /* Formulaire */
    form {
        display: flex;
        flex-direction: column;
        width:100%;
        padding: 1.5rem;
        border: 1px solid #c5d0c6;
        background: #fff;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        h1 {
          font-size: 1.5rem;
          letter-spacing: .4rem;
          padding-bottom: 1rem;
          text-transform: uppercase;
        }
        .label {
          font-weight: bolder;
        }
        input[type=text], input[type=password] {
          margin: .5rem auto;
          padding: .3rem;
          border-radius: 9px;
          background-color: #c5d0c6;
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
          width: 30%;
          padding: .7rem;
          margin: .5rem auto;
          margin-top: .5rem;
          text-decoration: none;
          background-color: #1b595c;
          border: 1px solid white;
          font-weight: bold;
          color: white;
          &.router-link-exact-active {
            color: #42b983;
          }
        }
        a:hover {
          background-color: #154a44;
          color: #fbc522;
          border: 1px solid #fbc522;
        }
    }
}
</style>
