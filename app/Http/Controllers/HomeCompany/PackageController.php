<?php

namespace App\Http\Controllers\HomeCompany;

use App\Http\Resources\HomeCompany\PackageCollection;
use App\Models\Company;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return new PackageCollection(Package::all());

    }
    public function buyPackage(Request $request, $package_id){
        // $company_id= $request->user()->id;
        // find company
        // $request->validate()
        // $company=Company::where('id',$company_id)->first();
        $company=Company::where('id',1)->first();

        //pay and check pay and save to database
        $company->packages()->attach($package_id);
    }

}
