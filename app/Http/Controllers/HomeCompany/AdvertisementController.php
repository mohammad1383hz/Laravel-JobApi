<?php

namespace App\Http\Controllers\HomeCompany;

use App\Http\Resources\Admin\AdvertisementCollection;
use App\Http\Resources\HomeCompany\AdvertisementResource;
use App\Http\Resources\HomeCompany\RequestCollection;
use App\Models\Advertisement;
use App\Models\Company;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
        public function createAds(Request $request){
            // $company_id= $request->user()->id;
            // find company
            // $request->validate()
            // $company=Company::where('id',$company_id)->first();
            $company=Company::where('id',1)->first();

            $packages = $company->packages()->wherePivot('status', 'active')->get();
            if($packages->count() > 0){
                // return response()->json(['f'=>$request->title]);
                $ads=new Advertisement([
                    'category_id'=>$request->category_id,
                    'title'=>$request->title,
                    'description'=>$request->description,

                ]);
                $company->advers()->save($ads);
                // and reduce number ads
            }
            // $ads=new Advertisement([$request->all]);
            // $company->advers()->save($ads);
        }

        public function checkPackage(Request $request){
            // $request->validate()
           //check package in laravel
        }
        public function showAdvertisementsCompany(Request $request){
           $id=$request->user()->id;
            $company=Company::where('id',$id)->first();
            $advertisements=$company->advers;
            return new AdvertisementCollection($advertisements);
        }
        public function showAdvertisement(Request $request,Advertisement $advertisement){
            return new AdvertisementResource($advertisement);

        }
        //  public function showRequestAdvertisement(Request $request,Advertisement $advertisement){

        //     return new RequestCollection($advertisement->requests);
        // }

}
