<template>
  <header>
    <img src="../assets/logo.png" alt="">
    <nav>
      <router-link to="/">Accueil</router-link>
      <router-link to="/login">Connexion</router-link>
      <router-link to="/register">Inscription</router-link>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'Header',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
header {
  margin-bottom: 3rem;
  background-color: white;
  a {
    color:green;
  }
}

</style>
