export default {
    methods: {
        getCookie(cookieName) {
          const cookieArr = document.cookie.split(";");
          for(let i = 0; i < cookieArr.length; i++) {
              const cookiePair = cookieArr[i].split("=");
              if(cookieName == cookiePair[0].trim()) {
                  return decodeURIComponent(cookiePair[1]);
              }
          }
          return null;
      }
    }
  };