<?php

namespace App\Http\Controllers\HomeCompany;

use App\Http\Resources\HomeCompany\ProfileResource;
use App\Models\Company;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        // dd($request->user());
        $id=$request->user()->id;
        $company=Company::where('id',$id)->first();
        return new ProfileResource($company);

    }
    public function update(Request $request,Company $company)
    {
        $id=$request->user()->id;
        $company=Company::where('id',$id)->first();
        $company->update($request->all);

    }
}
