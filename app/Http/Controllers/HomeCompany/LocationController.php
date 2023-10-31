<?php

namespace App\Http\Controllers\HomeCompany;

use App\Http\Resources\HomeCompany\CityCollection;
use App\Http\Resources\HomeCompany\ProvinceCollection;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getProvinces(){
        return new ProvinceCollection(Province::all());
       }
       public function getCities($id){
        $cities=City::where('province_id',$id)->get();
        return new CityCollection($cities);
       }
}
