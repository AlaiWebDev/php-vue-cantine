<template>
  <div class="home">
    <img v-if="!status" src="../assets/menu.jpg" alt="menu de la semaine">    
    <Children v-else :children="allChildren"/>
  </div>
</template>

<script>
import getCookie from '@/mixins/getCookiesMixin';
import ChildrenDataService from "../service/ChildrenDataService";
import Children from '@/components/Children';
export default {
  name: 'HomeView',
  components: {
    Children
  },
  mixins: [
    getCookie
  ],
  props: [
    "newMessage",
  ],
  data: function () {
    return {
      allChildren: [],
      status: this.getCookie("UserName")
    }
  },
  mounted() {
    console.log("messages : ",this.newMessage);
    this.$emit("messages", this.newMessage);
  },
  beforeMount() {
    if (this.getCookie("UserName")) {
        ChildrenDataService.retrieveChildren(
            this.getCookie("UserID"),
          ).catch(function(e) {
            return e;
          }).then((res) => {
            if (res.status == 200) {
                this.allChildren = res.data;
            }
          });
      }
  },
}
</script>
<style lang="scss">
  .home {
    img {
      width: 50vw;
      margin-top: 5rem;
    }
  }
</style>
