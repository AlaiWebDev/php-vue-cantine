<template>
<Header v-if="!isConnected"/>
<HeaderConnected v-else/>
<router-view/>
<Footer />
</template>
<script>
import Header from './components/Header.vue'
import HeaderConnected from './components/HeaderConnected.vue'
import Footer from './components/Footer.vue'
export default {
  name: 'App',
  components: {
    Header,
    HeaderConnected,
    Footer
  },
  data() {
    return {
      isConnected: false
    }
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
  height: 10vh;
    nav { 
      display: flex;
      justify-content: space-between;
      padding: 30px;

        a {
          padding: .5rem;
          text-decoration: none;
          font-weight: bold;
          color:green;
          &.router-link-exact-active {
            color: #42b983;
          }
        }
    }
}

</style>
