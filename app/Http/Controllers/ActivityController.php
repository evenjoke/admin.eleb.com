<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;

class ActivityController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }*/
    public function index(Request $request)
    {
        $wheres=[];
        if($request->name){
            $wheres[]=['title','like',"%{$request->name}%"];
        }
        if($request->start_time){
            $wheres[]=['start_time','>=',$request->start_time];
        }
        if($request->end_time){
            $wheres[]=['end_time','<=',$request->end_time];
        }
        $activitys = DB::table('activities')->where($wheres)->paginate(2);
        return view('Activity.index',compact('activitys'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ],
            [
                'title.required'=>'活动名不能为空',
                'content.required'=>'活动说明不能为空',
                'start_time.required'=>'开始时间不能为空',
                'end_time.required'=>'结束时间不能为空',

            ]);
        Activity::create([
            'title'=>$request->title,
            'content'=>strip_tags($request->content),
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ]);
        session()->flash('success','成功');
        return redirect()->route('activity.index');
    }
    public function create()
    {
        return view('Activity.add');
    }
    public function destroy(Activity $activity)
    {
        $activity->delete();
        session()->flash('success','分类删除成功');

        return redirect()->route('activity.index');

    }

    public function edit(Activity $activity)
    {

        return view('Activity.edit',compact('activity'));
    }

    public function update(Activity $activity,Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ],
            [
                'title.required'=>'活动名不能为空',
                'content.required'=>'活动说明不能为空',
                'start_time.required'=>'开始时间不能为空',
                'end_time.required'=>'结束时间不能为空',
            ]);
        $activity->update([
            'title'=>$request->title,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'content'=>strip_tags($request->content),

        ]);

        session()->flash('success','修改成功');
        return redirect()->route('activity.index');

    }
    public function show(Request $request)
    {
        $date=date("Y-m-d h:i:s");
       // dd($date);
        $activitys=DB::table('activities')->where('end_time','>=',$date)->paginate(5);
        return view('Activity.list',compact('activitys'));
    }
}
