<template>
  <div id="container">
    <form @submit="validateAndSubmit" id="register_form">
				<h1>Demande d'inscription d'un enfant</h1>
				<div class="label">Prénom</div>
				<input type="text" name="child_firstname" v-model="child_firstname"/>
				<div class="label">Date de naissance</div>
				<input type="text" name="child_birthdate" v-model="child_birthdate"/>
        <div class="label">Régime cantine</div>
        <select name="child_scheme" id="pet-select">
          <option value="">--Sélectionnez une option--</option>
          <option value="dog">1 - Demi-pension</option>
          <option value="cat">2 - Pension complète</option>
        </select>
				<fieldset>
          <legend>&nbsp;Allergies</legend>
          
          <label><input type="checkbox" name="gluten"/> Gluten </label>
          
          <label><input type="checkbox" name="arachide"/> Arachide</label>
          
          <label><input type="checkbox" name="autre" @click="autreAllergies"/> Autres</label>
          <textarea v-if="displayTextArea" name="" id="" cols="30" rows="10"></textarea>
        </fieldset>
				<input type="submit" name="valider" value="Valider" />
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
      <router-link to="/">Retour</router-link>  
  </div>
</template>

<script>
import getCookie from '@/mixins/getCookiesMixin';
import ChildrenDataService from "../service/ChildrenDataService";
export default {
  name: 'AddChildView',
  components: {
  },
  data: function () {
    return {
      errors: [],
      displayTextArea: false
    }
  },
  methods: {
    autreAllergies: function () {
      this.displayTextArea = !this.displayTextArea;
    }
  }
}
</script>
<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@300&family=Rowdies:wght@300&display=swap');
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
    form {
        width:100%;
        padding: 2rem;
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
        input[type=text], select{
          margin: .5rem;
          padding: .3rem;
          border-radius: 9px;
          background-color: #c5d0c6;
        }
        input[type=submit] {
        width: 70%;
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

      fieldset {
        display: flex;
        flex-direction: column;
        width: 70%;
        margin: auto;
        border-radius: 7px;
        legend {
          font-weight: bold;
          text-align: left;

        }
      }
      select {
        font-family: 'Roboto', sans-serif;
      }
    }
  }
</style>
