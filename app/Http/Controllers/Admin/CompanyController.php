<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\CompanyCollection;
use App\Http\Resources\Admin\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        return new CompanyCollection(Company::all());
    }
    public function show(Company $company){
        return new CompanyResource($company);

    }
    public function store(Request $request){
        $data = $request->all();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $data['company_security_id']=rand(1000, 9999);

        Company::create($data);
    }
    public function update(Company $company,Request $request){
        $data = $request->all();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $company->update($request->all());
    }
    public function delete(Company $company){
        $company->delete();
    }
    public function editStatus(Company $company,Request $request){
        $company->update(['status'=>$request->status]);
    }
}
