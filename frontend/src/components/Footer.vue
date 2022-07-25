<template>
  <footer class="footer">
    
    <address>
      <small>&copy; Copyright 2022, Alain ORLUK - ID-Formation</small>
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
  position:fixed;
  bottom:0;
  width: 100%;
  height:20px;
  address {
    display: flex;
    justify-content: space-between;
    background-color: #f2f2f2;
    small {
      padding: .2rem .2rem;
    }
    ul {
    display: flex;
    justify-content:center;
    align-items: center;
    margin-right: 5rem;
    list-style-type: none;
    li {
      a {
        padding: .5rem;
        padding-bottom: 0;
        text-decoration: none;
        color:#5c8c9c;
        font-weight: bold;
      }
      a:hover {
        color: #154a44;
      }
    }
  }
  }
  
}

</style>
