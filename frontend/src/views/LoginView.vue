<template>
  <div id="container">
			<!-- zone de connexion -->
			<img src="../assets/logo-transparent.png" alt="logo">
      <form method="POST">
          <h1>Connexion</h1>
				    <input type="text" name="user_email" required placeholder="exemple@domaine.com" role="presentation" autocomplete="1234"/>
				    <input type="password" required name="new-password" id="new-password" autocomplete="new-password" placeholder="Mot de passe"/>
          <input type="submit" name="connect" value="Connexion" />
          <label>Pas encore inscrit ?</label> 
          <router-link to="/register">Inscription</router-link>
      </form>	
  </div>
</template>
<script>

export default {
  name: 'LoginView',
}
</script>
<style lang="scss">
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
        background-color: #1b595c;
        color: white;
        padding: .8rem 1.2rem;
        margin: .5rem 0;
        border: 1px solid white;
        cursor: pointer;
        width: 100%;
      }
      input[type=submit]:hover {
        background-color: #154a44;
        color: #fbc522;
        border: 1px solid #fbc522;
      }
      a {
          color:green;
      }
    }
}
</style>