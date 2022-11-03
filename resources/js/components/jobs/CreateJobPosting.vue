<template>
    <a href="/">Home</a>
    <form @submit.prevent="createJob" action="" class="flex flex-col justify-center items-center">
        <div class="domain flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-4">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Domain</h1>
            </div>
            <div>
                <input type="checkbox" id="administrative"> Administrative
            </div>
            <div>
                <input type="checkbox" id="agriculture"> Agriculture
            </div>
            <div>
                <input type="checkbox" id="beauty"> Beauty
            </div>
            <div>
                <input type="checkbox" id="call"> Call center
            </div>
            <div>
                <input type="checkbox" id="construction"> Construction
            </div>
            <div>
                <input type="checkbox" id="education"> Education / Training / Coaching
            </div>
            <div>
                <input type="checkbox" id="engineering"> Engineering
            </div>
            <div>
                <input type="checkbox" id="it"> IT / Telecom
            </div>
            <div>
                <input type="checkbox" id="finance"> Finance                
            </div>
            <div>
                <input type="checkbox" id="medicine"> Medicine
            </div>
            <div>
                <input type="checkbox" id="security"> Security / Military
            </div>
            <div>
                <input type="checkbox" id="sports"> Sports
            </div>
        </div>

        <div class="experience flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Experience</h1>
            </div>
            <div>
                <input type="checkbox" id="0"> No experience
            </div>
            <div>
                <input type="checkbox" id="1"> Entry (0-2 years)
            </div>
            <div>
                <input type="checkbox" id="2"> Middle (2-5 years) 
            </div>
            <div>
                <input type="checkbox" id="3"> Senior (5-10 years) 
            </div>
            <div>
                <input type="checkbox" id="4"> Executive (>10 years) 
            </div>
        </div>

        <div class="language flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Language</h1>
            </div>
            <div>
                <input type="checkbox" id="english"> English
            </div>
            <div>
                <input type="checkbox" id="romanian"> Romanian
            </div>
            <div>
                <input type="checkbox" id="german"> German
            </div>
            <div>
                <input type="checkbox" id="spanish"> Spanish
            </div>
            <div>
                <input type="checkbox" id="french"> French
            </div>
            <div>
                <input type="checkbox" id="italian"> Italian
            </div>
            <div>
                <input type="checkbox" id="korean"> Korean
            </div>
        </div>

        <div class="type flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Type</h1>
            </div>
            <div>
                <input type="checkbox" id="fulltime"> Full time
            </div>
            <div>
                <input type="checkbox" id="parttime"> Part time
            </div>
            <div>
                <input type="checkbox" id="internship"> Internship
            </div>
            <div>
                <input type="checkbox" id="project"> Project
            </div>
            <div>
                <input type="checkbox" id="volunteer"> Volunteer
            </div>
        </div>

        <div class="study flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Studies</h1>
            </div>
            <div>
                <input type="checkbox" id="qualified"> Qualified
            </div>
            <div>
                <input type="checkbox" id="nonqualified"> Nonqualified
            </div>
            <div>
                <input type="checkbox" id="student"> Student
            </div>
            <div>
                <input type="checkbox" id="absolvent"> Absolvent
            </div>
        </div>

        <!-- !!!!!!!!!!!!!!!! USE API !!!!!!!!!!!!!!!! -->
        <div class="location flex flex-col justify-center border-2 border-black w-3/12 rounded-sm mt-8">
            <div class="h-3/12 w-full flex justify-center items-center">
                <h1 class="text-xl font-bold">Location</h1>
            </div>
            <div>
                <input type="checkbox" id="Bucharest"> Bucharest
            </div>
            <div>
                <input type="checkbox" id="Rome"> Rome
            </div>
            <div>
                <input type="checkbox" id="Budapest"> Budapest
            </div>
            <div>
                <input type="checkbox" id="Miami"> Miami
            </div>
        </div>

        <textarea class="border-2 border-black rounded-md mt-8" placeholder="Description" name="description" id="description" cols="48" rows="10"></textarea>
    
        <button class="py-2 px-6 border-2 rounded-md border-green-700 bg-green-200 hover:bg-green-700 hover:border-green-200 hover:text-white mt-4">Submit</button>
    </form>
</template>

<script>
    export default{
        data () {
            return {
                fields: {
                    'domain': [],
                    'experience': [],
                    'language': []
                }
            }
        },
        methods: {
            createJob(){
                console.log("Creating a job posting....")
            }
        }
    }
</script>