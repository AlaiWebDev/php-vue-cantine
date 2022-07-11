export default {
    methods: {
        setCookie(user) {
            let d = new Date();
                d.setTime(d.getTime() + 1 * 24 * 60 * 60 * 1000);
                let expires = "expires=" + d.toUTCString();
                document.cookie = "UserName=" + user.user_name + ";" + expires + ";path=/";
                document.cookie = "UserLevel=" + user.user_profile + ";" + expires + ";path=/";
                document.cookie = "UserID=" + user.id + ";" + expires + ";path=/";
        }
    }
};