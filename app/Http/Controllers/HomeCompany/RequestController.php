<?php

namespace App\Http\Controllers\HomeCompany;

use App\Http\Resources\HomeCompany\RequestCollection;
use App\Models\Advertisement;
use App\Models\Advertising;
use App\Models\Company;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Company $company)
    {
        $request=$company->requests;
        return new RequestCollection($request);

    }
    public function getRequsetForAds(Request $request,Advertisement $advertisement)
    {
    //     dd($request->user());
    //     $id=$request->user()->id;
    //    $company= Company::where('id',$id)->get();
        $request=$advertisement->requests;
        // //check only show advers request
        return new RequestCollection($request);
        // dd(5);

    }
    public function updateStatusRequestAdvers(Request $request,ModelsRequest $modelsRequest)
    {
        $modelsRequest->update(['status'=>$request->status]);
        // $request update status
        //check only show advers request
        // return new RequestCollection($request);

    }
}
