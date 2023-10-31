<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\SkillCollection;
use App\Http\Resources\Admin\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
        // $r=Skill::all();
        // dd($r);
        return new SkillCollection(Skill::all());
    }
    public function show(Skill $skill): SkillResource
    {
        return new SkillResource($skill);

    }
    public function store(Request $request){
        Skill::create($request->all());
    }
    public function update(Skill $skill,Request $request){
        $skill->update($request->all());
    }
    public function delete(Skill $skill){
        $skill->delete();
    }
    public function editStatus(Skill $skill,Request $request){
        $skill->update(['status'=>$request->status]);
    }
}
