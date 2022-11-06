<template>
    <a href="/">Home</a>

    <!-- SĂ IAU TOT DIN API!!!! -->

    <form @submit.prevent="createJob" action="" class="flex flex-col justify-center items-center">
        <input v-model="fields.title" type="text" name="title" id="title" class="border-2 border-black rounded-sm px-2 w-3/12" placeholder="Title">
        <input v-model="fields.company" type="text" name="company" id="company" class="mt-4 border-2 border-black rounded-sm px-2 w-3/12" placeholder="Company name">
        <input v-model="fields.salary" step="0.01" type="number" name="salary" id="salary" class="mt-4 border-2 border-black rounded-sm px-2 w-3/12"> (not required)
        <div class="domain flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-4">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Domain</h1>
            </div>

            <div v-for="domain in domains">
                <input @change="changeCategory($event)" name="domain" type="checkbox" :id="domain.id"> {{domain.name}}
            </div>
        </div>

        <div class="experience flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Experience</h1>
            </div>
            <div v-for="experience in experiences">
                <input @change="changeCategory($event)" name="experience" type="checkbox" :id="experience.id"> {{experience.name}}
            </div>
            
        </div>

        <div class="language flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Language</h1>
            </div>
            <div v-for="language in languages">
                <input @change="changeCategory($event)" name="language" type="checkbox" :id="language.id"> {{language.name}}
            </div>
        </div>

        <div class="type flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Type</h1>
            </div>
            <div v-for="kind in types">
                <input @change="changeCategory($event)" name="type" type="checkbox" :id="kind.id"> {{kind.name}}
            </div>
        </div>

        <div class="study flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Studies</h1>
            </div>
            <div v-for="study in studies">
                <input @change="changeCategory($event)" name="study" type="checkbox" :id="study.id"> {{study.name}}
            </div>
        </div>

        <!-- !!!!!!!!!!!!!!!! USE API !!!!!!!!!!!!!!!! -->
        <div class="location flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Location</h1>
            </div>
            <div v-for="location in locations">
                <input @change="changeCategory($event)" type="checkbox" name="location" :id="location.id"> {{location.name}}
            </div>
        </div>

        <textarea v-model="fields.description" class="border-2 border-black rounded-md mt-8" placeholder="Description" name="description" id="description" cols="48" rows="10"></textarea>
    
        <button class="py-2 px-6 border-2 rounded-md border-green-700 bg-green-200 hover:bg-green-700 hover:border-green-200 hover:text-white mt-4">Submit</button>
    </form>
</template>

<script>
    export default{
        data () {
            return {
                fields: {
                    'title': '',
                    'domain': [],
                    'experience': [],
                    'language': [],
                    'location': [],
                    'type': [],
                    'study': [],
                    'description': '',
                    'company': '',
                    'salary': 0
                },
                domains: [],
                experiences: [],
                languages: [],
                locations: [],
                studies: [],
                types: [],
                token: ''
            }
        },
        created(){
            let url = window.location.origin
            url += '/api/get_token'
            axios.get(url)
            .then(res => {
                this.token = res.data.token
                console.log(this.token)
            })
            .catch(err => console.log(err))
            
            let url1 = window.location.origin
            url1 += '/api/get_categories'
            axios.get(url1)
            .then(res => {
                this.domains = res.data.domains
                this.experiences = res.data.experiences
                this.languages = res.data.languages
                this.locations = res.data.locations
                this.studies = res.data.studies
                this.types = res.data.types
            })
            .catch(err => console.log(err))
        },
        methods: {
            createJob(){
                console.log(this.fields.company)
                let url = window.location.origin
                url += '/api/create_job'
                axios.post(url, this.fields, {
                    headers: {
                        'Authorization': 'Bearer ' + this.token
                    }
                })
                .then(res => console.log(res))
                .catch(err => console.log(err))
            },
            changeCategory(e){
                let category = e.target.name
                if(e.target.checked == true){
                    this.fields[category].push(e.target.id)
                }
                else{
                    this.fields[category].splice(this.fields[category].indexOf(e.target.id), 1);
                }
                console.log(this.fields[category])
            }
        }
    }
</script>