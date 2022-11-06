<template>
    <nav>
        <h1>Hello World!</h1>
            <a href="login">Login</a>
            <a href="register">Register</a>
            <Logout></Logout>
            <a href="createjob">Create job</a>
    </nav>
    <div class="flex flex-row border-2 border-green-800">
        <div class="filters border-2 border-red-800 w-4/12">
            
        </div> 
        <div class="border-2 border-blue-800 w-8/12">
            <div class="border-3 rounded-md m-4 p-5 bg-white border-2" v-for="job in jobs">
                <h2 class="created_at">{{job.created_at}}</h2>
                <h1 class="title text-2xl font-bold">{{job.title}}</h1>
                <h2 class="company">{{job.company}}</h2>
                <p v-if="job.salary != 0" class="salary">{{job.salary}}$</p>
                <div class="flex flex-row">
                    <p v-for="domain in job.domains" class="mr-2">
                        {{domain.name}} 
                    </p>
                </div>
                <div class="flex flex-row">
                    <p v-for="kind in job.types" class="mr-2">
                        {{kind.name}} 
                    </p>
                </div>
                <div class="buttons flex flex-row mt-4">
                    <div class="w-10/12">
                        <button class="border-2 rounded-md py-1 px-6 text-gray-400 bg-red-200 border-red-800 hover:border-red-200 hover:bg-red-600 hover:text-white">
                            <svg class="h-6 w-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M12 20l-7 -7a4 4 0 0 1 6.5 -6a.9 .9 0 0 0 1 0a4 4 0 0 1 6.5 6l-7 7" /></svg>
                        </button>
                        <button class="ml-2 border-2 rounded-md py-1 px-6 text-gray-400 bg-green-200 border-green-800 hover:border-green-200 hover:bg-green-600 hover:text-white">
                            <svg class="h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                    <button class="border-2 rounded-md py-1 px-6 bg-purple-200 border-purple-800 hover:border-purple-200 hover:bg-purple-600 hover:text-white">Apply</button>
                </div>    
            </div>
        </div>
    </div>  
</template>

<script>
    import Logout from './auth/Logout.vue'

    export default {
        data(){
            return {
                jobs: []
            }
        },
        components: {
            'Logout': Logout
        },
        created(){
            axios.get('/api/jobs')
            .then(res => {
                this.jobs = res.data.jobs
                console.log(res.data)
            })
            .catch(err => console.log(err))
        }
    }
</script>