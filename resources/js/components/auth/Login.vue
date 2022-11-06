<template>
    <a href="/">Home</a>
    <div class="w-full h-screen flex flex-col justify-center items-center">
        <form @submit.prevent="login" action="" class="flex flex-col justify-evenly items-center w-3/12 border-2 border-purple-200 rounded-md py-24 px-64">
            <input v-model="fields.email" type="email" placeholder="Email" name="email" class="mt-4 bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" >
            <input v-model="fields.password" type="password" placeholder="Password" name="password" class="mt-4 bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" > 
            <button type="submit" class="px-6 py-2 border-2 border-grey rounded-md bg-purple-400 mt-4 hover:bg-purple-800 hover:text-white">Login</button>
        </form>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                fields: {
                    'email': '',
                    'password': ''
                }
            }
        },
        methods: {
            login(){
                let url = window.location.origin
                url += '/api/login'
                axios.post(url, this.fields)
                .then(res => console.log(res))
                .catch(err => console.log(err))
            }
        }
    }
</script>