<template>
    <a href="/">Home</a>
    <div class="w-full h-screen flex flex-col justify-center items-center">
        <form @submit.prevent="register" action="" class="flex flex-col justify-evenly items-center w-3/12 border-2 border-purple-200 rounded-md py-24 px-64">
            <input v-model="fields.name" placeholder="Name" name="name" type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
            <input v-model="fields.email" type="email" placeholder="Email" name="email" class="mt-4 bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" >
            <input v-model="fields.password" type="password" placeholder="Password" name="password" class="mt-4 bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" > 
            <input v-model="fields.password_confirmation" type="password" placeholder="Password Confirmation" name="password_confirmation" class="mt-4 bg-gray-200 appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" >
            <button type="submit" class="px-6 py-2 border-2 border-grey rounded-md bg-purple-400 mt-4">Register</button>
        </form>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                fields: {
                    'name': '',
                    'email': '',
                    'password': '',
                    'password_confirmation': ''
                }
            }
        },
        methods: {
            register(){
                let url = window.location.origin
                url += '/api/register'
                axios.post(url, this.fields)
                .then(res => console.log(res))
                .catch(err => console.log(err))
            }
        }
    }
</script>