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
        $jobs = Job::all();
        foreach($jobs as $job){
            $job->domains;
            $job->languages;
            $job->locations;
            $job->types;
            $job->studies;
            $job->experiences;
        }

        return response(['jobs' => $jobs]);
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
            $domain = Domain::findOrFail($domain_id);
            $job->domains()->attach($domain);
        }
        foreach($request->experience as $experience_id){
            $experience = Experience::findOrFail($experience_id);
            $job->experiences()->attach($experience);
        }
        foreach($request->language as $language_id){
            $language = Language::findOrFail($language_id);
            $job->experiences()->attach($language);
        }
        foreach($request->location as $location_id){
            $location = Location::findOrFail($location_id);
            $job->locations()->attach($location);
        }
        foreach($request->type as $type_id){
            $type = Type::findOrFail($type_id);
            $job->types()->attach($type);
        }
        foreach($request->study as $study_id){
            $job_study = Job_study::create([
                'study_id' => $study_id,
                'job_id' => $job->id
            ]);
            $study = Study::findOrFail($study_id);
            $job->studies()->attach($study);
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

    public function filter_jobs(Request $request)
    {
        if($request->changedCategory == "domains"){
            $queries = Domain_job::where("domain_id", "=", $request->id)->get();
        }
        else if($request->changedCategory == "experiences"){
            $queries = Experience_job::where("experience_id", "=", $request->id)->get();

        }
        else if($request->changedCategory == "languages"){
            $queries = Job_language::where("language_id", "=", $request->id)->get();

        }
        else if($request->changedCategory == "locations"){
            $queries = Job_location::where("location_id", "=", $request->id)->get();

        }
        else if($request->changedCategory == "studies"){
            $queries = Job_study::where("study_id", "=", $request->id)->get();

        }
        else if($request->changedCategory == "types"){
            $queries = Job_type::where("type_id", "=", $request->id)->get();
        }
        $arr = $request->filteredJobs;
        foreach($queries as $query){
            $job = Job::findOrFail($query->job_id);
            array_push($arr, $job);
        }
        

        return response(['jobs' => $arr]);
    }
}
