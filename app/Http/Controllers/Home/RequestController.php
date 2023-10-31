<?php

namespace App\Http\Controllers\Home;

use App\Http\Resources\Home\RequestCollection;
use App\Models\Advertisement;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function makeRequest(Request $request,$advertisement_id){
        $advertisement= Advertisement::where('id',$advertisement_id)->first();
        $company_id=$advertisement->company->id;
        // $id=$request->user()->id;
        // find resome
        ModelsRequest::create([
            'user_id'=>1,
            'company_id'=>$company_id,
            'advertisement_id'=>$advertisement_id,
            'description'=>$request->description,
        ]);
        return response()->json('make request',201);
        // dd($advertisement);
        // show all request user and status

    }



    public function showallrequest(Request $request){
        $user_id= $request->user()->id;
        $user=User::where('id',$user_id)->get();
        $requests=$user->requests;
        return new RequestCollection($requests);
    }

}

