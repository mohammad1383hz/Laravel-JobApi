<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\CityCollection;
use App\Http\Resources\Admin\CityResource;
use App\Http\Resources\Admin\ProvinceCollection;
use App\Http\Resources\Admin\ProvinceResource;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request as ClientRequest;

class CityController extends Controller
{
    public function indexProvince(){
        return new ProvinceResource(Province::all());
    }
    public function showProvince(Province $Province){
        return new ProvinceCollection($Province);

    }
    public function createProvince(ClientRequest $request){
        Province::create($request);
        //crete paraent children
    }
    public function updateProvince(Province $Province,ClientRequest $request){
        $Province->update($request->all);
    }
    public function deleteProvince(Province $Province){
        $Province->delete();
    }




    public function indexCity(){
        return new CityResource(City::all());
    }
    public function showCity(City $city){
        return new CityCollection($city);

    }
    public function createCity(ClientRequest $request){
        City::create($request);
        //crete paraent children
    }
    public function updateCity(City $city,ClientRequest $request){
        $city->update($request->all);
    }
    public function deleteCity(City $city){
        $city->delete();
    }
}
