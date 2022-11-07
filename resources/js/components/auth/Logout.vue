<template>
    <button @click="logout">Log Out</button>
</template>

<script>
    export default {
        data(){
            return {
                token: ''
            }
        },
        methods: {
            logout(){
                let url = window.location.origin
                url += '/api/logout'
                axios.post(url, {}, {
                    headers: {
                        'Authorization': 'Bearer ' + this.token
                    }
                })
                .then(res => {
                    console.log(res)
                    this.token = ''
                })
                .catch(err => console.log(err))
            }
        },
        created(){
            let url = window.location.origin
            url += '/api/get_token'
            axios.get(url)
            .then(res => {
                this.token = res.data.token
                console.log(this.token)
                this.$emit('tokenSent', this.token)

            })
            .catch(err => console.log(err))

        }
    }
</script>