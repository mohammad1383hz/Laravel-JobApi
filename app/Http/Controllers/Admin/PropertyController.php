<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\PropertyCollection;
use App\Http\Resources\Admin\PropertyResource;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Property;
use App\Models\PropertyValue;

class PropertyController extends Controller
{
    public function index()
    {
        return new PropertyCollection(Property::all());

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
        Property::create([
            'name'=>$request->name,
            // 'status'=>$request->status,
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
    public function show(Property $property)
    {

        return new PropertyResource($property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //request->validete()
        $property->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
    }
    public function makeValue(Request $request,Property $property)
    {
        $propertyvalue=new PropertyValue(['value' => $request->value]);
        // $request->validate()
        //
       $property->values()->save($propertyvalue);
        // return \response()->json()
    }
}
