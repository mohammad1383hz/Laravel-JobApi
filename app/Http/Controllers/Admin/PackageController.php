<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\PackageCollection;
use App\Http\Resources\Admin\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware(['permission:user.index'])->only('index');
    //     // $this->middleware(['permission:user.store'])->only('store');
    //     // $this->middleware(['permission:user.show'])->only('show');
    //     // $this->middleware(['permission:user.update'])->only('update');
    //     // $this->middleware(['permission:user.destroy'])->only('destroy');
    //     // $this->middleware(['permission:user.restore'])->only('restore');
    // }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PackageCollection(Package::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate()
        //
        Package::create([
            'title'=>$request->title,
            'price'=>$request->price,
            'number'=>$request->number,
            // 'description'=>$request->description,

        ]);
        // return \response()->json()
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {

        return new PackageResource($package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //request->validete()
        $package->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
    }
}
