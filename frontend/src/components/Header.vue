<template>
  <header>
    <img src="../assets/logo.png" alt="">
    <nav>
      <router-link to="/">Accueil</router-link>
      <router-link to="/inbox" v-if="this.$store.state.connectStatus">Messagerie</router-link>
      <router-link to="/login" v-if="!this.$store.state.connectStatus">Connexion</router-link>
      <router-link to="/login" v-else @click="disconnect">Déconnexion</router-link>
      <router-link to="/register" v-if="!this.$store.state.connectStatus">Inscription</router-link>
    </nav>
  </header>
</template>

<script>
import clearCookies from '@/mixins/clearCookiesMixin';
export default {
  name: 'Header',
  data() {
    return {
    }
  },
  mixins: [
    clearCookies
  ],
  methods: {
    disconnect () {
      this.clearCookies();
      this.$store.commit('setStatus',false);
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
header {
  background-color: white;
}

</style>
