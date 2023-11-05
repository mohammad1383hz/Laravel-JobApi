<?php

namespace App\Http\Controllers\Home;

use App\Http\Resources\Home\RequestCollection;
use App\Models\Job;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function makeRequest(Request $request,$job_id){
        $job= Job::where('id',$job_id)->first();
        $company_id=$job->company->id;
        $id=$request->user()->id;
        // find resome
        ModelsRequest::create([
            'user_id'=>$id,
            'company_id'=>$company_id,
            'job_id'=>$job_id,
            'description'=>$request->description,
        ]);
        //check make Duplicate
        return response()->json(['success' => true, 'message' => 851], 200);
        // dd($advertisement);
        // show all request user and status

    }



    public function showallrequest(Request $request){
        $user_id= $request->user()->id;
        $user=User::where('id',$user_id)->first();
        $requests=$user->Requests;
        return new RequestCollection($requests);
    }

}

