<template>
    <h1>Hello World!</h1>
    <a href="login">Login</a>
    <a href="register">Register</a>
    <Logout></Logout>
</template>

<script>
    import Logout from './auth/Logout.vue'

    export default {
        data(){
            return {}
        },
        components: {
            'Logout': Logout
        }
    }
</script>