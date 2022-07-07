<template>
  <div id="container">
		<img src="../assets/logo-transparent.png" alt="logo">
			
			<form name="inscription" method="post" enctype="multipart/form-data">
				<h1>Inscription</h1>
				<div class="label">Nom</div>
				<input type="text" name="user-name" required/>
				<div class="label">E-mail</div>
				<input type="text" name="user_email" required/>
        <div class="label">Téléphone</div>
				<input type="text" name="user_phone" required/>
				<div class="label">Rue</div>
				<input type="text" name="user_street" required/>
				<div class="label">Ville</div>
				<input type="text" name="user_city" required/>
				<div class="label">Code postal</div>
				<input type="text" name="user_zipcode" required/>
				<div class="label">Mot de passe</div>
				<input type="password" required name="new-password" id="new-password" autocomplete="new-password"/>
				<div class="label">Confirmation du mot de passe</div>
				<input type="password" name="repass" required/>
				<input type="submit" name="valider" value="Valider" />
				Déja inscrit ?
				<router-link to="/login">Connexion</router-link>
			</form>
		</div>
</template>

<script>

export default {
  name: 'RegisterView',
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
        input[type=text], input[type=password] {
          background-color: #c5d0c6;
        }
        a {
          color:green;
        }
    }
}
</style>
