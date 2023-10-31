<?php

namespace App\Http\Controllers\Auth;


use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CompanyAuthController extends Controller
{
    public function register(Request $request){
        //validate
        $randomNumber = rand(1000, 9999);
            $company = Company::create([
             'name' => $request['name'],
             "phone"=>$request['phone'],
             "brand"=>$request['brand'],
             "web_site"=>$request['web_site'],
            //  "status"=>$request['status'],
            'company_security_id'=>$randomNumber,
             "description"=>$request['description'],
            'password'=>Hash::make($request['password'])
        ]);
    //     //login company

        $token = $company->createToken($request->server('HTTP_USER_AGENT'));
    //            $token->accessToken->ip = $request->json()->get('ip');
    //            $token->accessToken->platform = $request->json()->get('platform');
    //            $token->accessToken->save();
                $data = [
                    'token' => $token->plainTextToken,
    //                'permissions' => auth()->user()->getPermissionNames(),
    //                'roles' => auth()->user()->getRoleNames(),
                ];
    //            $user=auth()->attempt($validated);
    //             return response()->json($data,201);
    return response()->json($data,201);
    }
    public function login(Request $request){
        // dd(2);
            $validated = $request->validate([
                'phone'=>'required',
                'password' => 'required'
            ]);
            // return response()->json($request->phone,201);

            $company=Company::where('phone',$request->phone)->first();
            // return response()->json(['success' => false, 'message' => 851], 200);

            // dd($company);
            if (!$company){
                // response false company after enter password
                return response()->json(['success' => false, 'message' => 'not exist company'], 200);
            }
            else{
               if(! Hash::check($request->password,$company->password)){
                return response()->json(['success' => false, 'message' => 'not correct password'], 200);
                   // response false user after enter password
            }else{
                $token = $company->createToken($request->server('HTTP_USER_AGENT'));
    //            $token->accessToken->ip = $request->json()->get('ip');
    //            $token->accessToken->platform = $request->json()->get('platform');
    //            $token->accessToken->save();
                $data = [
                    'token' => $token->plainTextToken,
    //                'permissions' => auth()->user()->getPermissionNames(),
    //                'roles' => auth()->user()->getRoleNames(),
                ];
                // dd(4);
    //            $user=auth()->attempt($validated);
                return response()->json($data,201);

               }
        }

    }


}
