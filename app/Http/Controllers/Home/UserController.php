<?php

namespace App\Http\Controllers\Home;

use App\Models\RecordEdocational;
use App\Models\RecordWork;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile(Request $request){
        $id=$request->user()->id;
        $user=User::where('id',$id)->with('RecordWork','RecordEdocationals')->first();
        $user->update([
            'my_about'=>$request['my_about']
        ]);
        return response()->json(['success'=>true]);
    }

    public function complateProfile(Request $request){
        $id=$request->user()->id;
        $user=User::where('id',$id)->first();
        $user->update([
            'my_about'=>$request['my_about']
        ]);
        return response()->json(['success'=>true]);
    }
    public function complateRecordWork(Request $request){

        $id=$request->user()->id;
        $user=User::where('id',$id)->first();
       $recordWork=new RecordWork([

                'title'=>$request['title'],
        'company_name'=>$request['company_name'],
        // 'start_time'=>$request['start_time'],
        // 'end_time'=>$request['end_time'],
        'description'=>$request['description']
       ]);
       $user->RecordWork()->save($recordWork);
       return response()->json(['success'=>true]);


    }
    public function complateRecordEdocational(Request $request){
        $id=$request->user()->id;
        $user=User::where('id',$id)->first();

        $recordEdocational=new RecordEdocational([
            'filed_study'=>$request['filed_study'],
            'uni_name'=>$request['uni_name'],
            'grades'=>$request['grades'],
            // 'start_time'=>$request['start_time'],
            // 'end_time'=>$request['end_time'],
            'description'=>$request['description']

        ]);

       $user->RecordEdocationals()->save($recordEdocational);
       return response()->json(['success'=>true]);

    }
}
