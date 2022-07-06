<template>
  <div id="container">
		<img src="assets/img/logo-transparent.png" alt="">
			
			<form name="inscription" method="post" enctype="multipart/form-data">
				<h1>Inscription</h1>
				<div class="label">Nom</div>
				<input type="text" name="nom" required />
				<div class="label">Prénom</div>
				<input type="text" name="prenom" required />
				<div class="label">Login</div>
				<input type="text" name="login" required />
				<div class="label">Mot de passe</div>
				<input type="password" name="pass" required />
				<div class="label">Confirmation du mot de passe</div>
				<input type="password" name="repass" required />
				<input type="submit" name="valider" value="S'inscrire" />
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
<style lang="scss">
  #container{
    width:30%;
    margin: 9rem auto;
    padding: 2rem;
    border: 1px solid #f1f1f1;
    background: #fff;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    /* Formulaire */
    form {
        width:100%;
        padding: 2rem;
        border: 1px solid #c5d0c6;
        background: #fff;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
}
</style>
