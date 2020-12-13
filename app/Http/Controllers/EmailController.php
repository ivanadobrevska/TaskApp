<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Activity;

class EmailController extends Controller
{
    public function send(Request $request) {
        $this->validate($request,[
            'userid' => 'required',
            'email' => 'required|email'
        ]);

        $data = [
            'userid' => $request->userid,
            'email' => $request->email
        ];

        Mail::to($request->email)->send(new SendMail(($data)));
        return redirect()->back();
    }

    public function report(Request $request) {
        $id = $request->route('id');
        $activities = Activity::where('user_id', $id)->get();
        return view('emails.report', ['activities' => $activities]);
    }
}
