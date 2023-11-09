<?php

namespace App\Http\Controllers\HomeCompany;

use App\Http\Resources\HomeCompany\jobResource;
use App\Http\Resources\HomeCompany\JobCollection;
use App\Http\Resources\HomeCompany\RequestCollection;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
        public function createJob(Request $request){
            // $company_id= $request->user()->id;
            // find company
            // $request->validate()
            // $company=Company::where('id',$company_id)->first();
            $company=Company::where('id',1)->first();

            $packages = $company->packages()->wherePivot('status', 'active')->get();
            if($packages->count() > 0){
                // return response()->json(['f'=>$request->title]);
                $job=new Job([
                    'category_id'=>$request->category_id,
                    'title'=>$request->title,
                    'description'=>$request->description,

                ]);
                $company->jobs()->save($job);
                // and reduce number ads
            }
            // $ads=new job([$request->all]);
            // $company->jobs()->save($ads);
        }

        public function checkPackage(Request $request){
            // $request->validate()
           //check package in laravel
        }
        public function showJobsCompany(Request $request){
           $id=$request->user()->id;
            $company=Company::where('id',$id)->first();
            $jobs=$company->jobs;
            return new JobCollection($jobs);
        }
        public function showJob(Request $request,Job $job){
            return new JobResource($job);

        }
        //  public function showRequestjob(Request $request,job $job){

        //     return new RequestCollection($job->requests);
        // }

}
