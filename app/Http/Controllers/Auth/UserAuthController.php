<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserAuthController extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            // 'gender' => $request['gender']['name'],
            // 'email' => $request['email'],
            'phone' => $request['phone'],

            'password' => $request['password'] ? Hash::make($request['password']) : null,
        ]);
        $token = $user->createToken($request->server('HTTP_USER_AGENT'));
    //            $token->accessToken->ip = $request->json()->get('ip');
    //            $token->accessToken->platform = $request->json()->get('platform');
    //            $token->accessToken->save();
                $data = [
                    'token' => $token->plainTextToken,
    //                'permissions' => auth()->user()->getPermissionNames(),
    //                'roles' => auth()->user()->getRoleNames(),
                ];
    //            $user=auth()->attempt($validated);
                return response()->json($data,201);
    }
    public function login(Request $request){

            $validated = $request->validate([
                'phone'=>'required',
                'password' => 'required'
            ]);
            $user=User::where('phone',$request->phone)->first();
            if (!$user){
                // response false user after enter password
                return response()->json(['success' => false, 'message' => 851], 200);
            }
            else{
               if(! Hash::check($request->password,$user->password)){
                return response()->json(['success' => false, 'message' => 851], 200);
                   // response false user after enter password
            }else{
                $token = $user->createToken('auth');
    //
                $data = [
                    'token' => $token->plainTextToken,
                    'roles'=>''
                ];
                return response()->json($data,201);

               }
        }

    }


}
