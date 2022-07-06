<template>
  <footer class="footer">
    <address>
      <ul>
        <li>
          <a href="https://id-formation.com/" target="_blank">ID School</a>
        </li>
        <li>
          <a href="https://linkedin.com/in/alainwebdev" target="_blank">Linkedin</a>
        </li>
        <li>
          <a href="https://github.com/AlaiWebDev/php-vue-cantine" target="_blank">Github</a>
        </li>
      </ul>
    </address>
  </footer>
</template>

<script>
export default {
  name: 'Footer'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.footer {
  position:absolute;
  bottom:0;
  width: 100%;
  height:60px;
  // padding:1.5rem;
  ul {
    background-color: #f2f2f2;
    display: flex;
    justify-content:center;
    list-style-type: none;
    li {
      a {
        display: inline-block;
        padding: 1.3rem;
        text-decoration: none;
        color:green;
      }
    }
  }
}

</style>
