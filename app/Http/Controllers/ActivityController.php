<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ActivityController extends Controller
{
    public function addActivity(ActivityRequest $request) {
        $validateActivity = $request->validated();
        $activity = new Activity();
        $activity->user_id = (int)$validateActivity['userid'];
        $activity->activity_date = $validateActivity['activity_date'];
        $activity->time_spent = (int)$validateActivity['time_spent'];
        $activity->description = $validateActivity['description'];
        $activity->save();
        return redirect()->back();
    }

    public function selectInterval(Request $request) {
        $this->validate($request,[
            'userid' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);
        $from=$request->start_date;
        $to=$request->end_date;
        $id = $request->route('id');
        $activities = Activity::whereBetween('activity_date', [new Carbon($from), new Carbon($to)])->where('user_id', Session::get('id'))->orderBy('activity_date', 'asc')->get();
        $activities_sum = Activity::whereBetween('activity_date', [new Carbon($from), new Carbon($to)])->where('user_id', Session::get('id'))->sum('time_spent');
        return view('report',['activities' => $activities, 'to' => $to, 'from'=>$from, 'sum'=>$activities_sum]);
    }

   
}
