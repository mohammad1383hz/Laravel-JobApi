<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Home\FavouriteResource;
use App\Models\Favourite;
use App\Models\Favourites;
use App\Models\User;
use Illuminate\Http\Request;

class FavouritesjobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id= $request->user()->id;
        $user=User::where('id',$user_id)->first();
        $favourites=$user->favourites;
        return new FavouriteResource($favourites);
    }


    public function store(Request $request)
    {
        $user_id= $request->user()->id;
        $user=User::where('id',$user_id)->first();
        $favourite=Favourite::create([
            'user_id'=> $user_id,
            'job_id'=> $request['job_id'],
            'description'=> $request['description'],
        ]);
        return response()->json(['success' => true, 'message' => 851], 200);

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }


    public function destroy(Favourite $favourite)
    {
        $favourite->delete();
        return response()->json(['success' => true, 'message' => 851], 200);

    }
}
