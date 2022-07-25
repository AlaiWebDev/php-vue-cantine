<template>
<Header :messages="messageToRead" :connected="connectionStatus" @connectionStatus="false"/>
<router-view @messages="signalMessage"/>
<Footer />
</template>
<script>
import getCookie from '@/mixins/getCookiesMixin';
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
export default {
  name: 'App',
  components: {
    Header,
    Footer
  },
  mixins: [
    getCookie
  ],
  data() {
    return {
      messageToRead: 0
    }
  },
  computed: {
    connectionStatus: function () {
      if (this.getCookie("UserName")) {
        this.$store.commit('setStatus', true);
        return true;
      }
    }
  },
  methods: {
    signalMessage: function (nbMessages) {
      console.log("nbMessages : ", nbMessages);
      this.messageToRead = nbMessages;
    }
  }
}
</script>
<style lang="scss">
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-size: 12px;
  font-style: normal;
  font-family: 'Roboto', sans-serif;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
  background-image: url(./assets/background-image.jpg);
  background-repeat: no-repeat;
  background-size:cover;
  height: 100vh;
}
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 6vh;
    nav { 
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 30px;
        a {
          padding: .5rem;
          text-decoration: none;
          font-weight: bold;
          color:#1b595c;
          &.router-link-exact-active {
            color: #42b983;
          }
        }
    }
}

</style>
