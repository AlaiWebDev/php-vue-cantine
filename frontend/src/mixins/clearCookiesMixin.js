export default {
    methods: {
        clearCookies() {
            let d = new Date();
            d.setTime(d.getTime() - 2 * 24 * 60 * 60 * 10000);
            let expires = "expires=" + d.toUTCString();
            const cookieValue = document.cookie.split('; ').find(row => row.startsWith('UserName='))?.split('=')[1];
            const cookieValue2 = document.cookie.split('; ').find(row => row.startsWith('UserLevel='))?.split('=')[1];
            document.cookie = "UserName=" + cookieValue + ";" + expires + ";path=/";
            document.cookie = "UserLevel=" + cookieValue2 + ";" + expires + ";path=/";
      }
    }
  };