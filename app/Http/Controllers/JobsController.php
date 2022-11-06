<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Domain;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Location;
use App\Models\Study;
use App\Models\Type;
use App\Models\Job;
use App\Models\Domain_job;
use App\Models\Experience_job;
use App\Models\Job_language;
use App\Models\Job_location;
use App\Models\Job_study;
use App\Models\Job_type;


class JobsController extends Controller
{
    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $user_id = Auth::id();

        $job = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'company' => $request->company,
            'salary' => $request->salary,
            'user_id' => $user_id
        ]);        

        foreach($request->domain as $domain_id){
            $domain_job = Domain_job::create([
                'domain_id' => $domain_id,
                'job_id' => $job->id
            ]);
        }
        foreach($request->experience as $experience_id){
            $experience_job = Experience_job::create([
                'experience_id' => $experience_id,
                'job_id' => $job->id
            ]);
        }
        foreach($request->language as $language_id){
            $job_language = Job_language::create([
                'language_id' => $language_id,
                'job_id' => $job->id
            ]);
        }
        foreach($request->location as $location_id){
            $job_location = Job_location::create([
                'location_id' => $location_id,
                'job_id' => $job->id
            ]);
        }
        foreach($request->type as $type_id){
            $job_type = Job_type::create([
                'type_id' => $type_id,
                'job_id' => $job->id
            ]);
        }
        foreach($request->study as $study_id){
            $job_study = Job_study::create([
                'study_id' => $study_id,
                'job_id' => $job->id
            ]);
        }

        return response(['success' => "Job created successfully!"]);
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    
    public function get_categories()
    {
        //

        $domains = Domain::all();
        $experiences = Experience::all();
        $languages = Language::all();
        $locations = Location::all();
        $studies = Study::all();
        $types = Type::all();

        return response([
            'domains' => $domains,
            'experiences' => $experiences,
            'languages' => $languages,
            'locations' => $locations,
            'studies' => $studies,
            'types' => $types
        ]);
    }
}
