<template>
<Header :connected="connectionStatus" @connectionStatus="false"/>
{{ connectionStatus }}
<router-view/>
<Footer />
</template>
<script>
import getCookie from '@/mixins//getCookiesMixin';
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
    }
  },
  computed: {
    connectionStatus: function () {
      if (this.getCookie("UserName")) {
        return true;
      }
    }
  },
  methods: {
  }
}
</script>
<style lang="scss">
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-size: 16px;
  font-style: normal;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
  background-image: url(./assets/background-image.jpg);
  background-repeat: no-repeat;
  height: 100vh;
}
header {
  display: flex;
  justify-content: space-between;
  height: 8vh;
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
