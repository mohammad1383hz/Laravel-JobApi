<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\UserCollection;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        return new UserCollection(User::all());
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
        User::create($request->all());
        // return \response()->json()
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

    if (isset($data['password'])) {
        $data['password'] = bcrypt($data['password']);
    }

    $user->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
    public function editStatus(Request $request, User $user)
    {
        $user->update(['status'=>$request->status]);
    }
}
