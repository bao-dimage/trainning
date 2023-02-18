<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimesheetFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        
         return view('timesheet.create');
    }
    public function store(TimesheetFormRequest $request){
        
        $validatedData = $request->validated();
        $timesheet = new Timesheet;
        $timesheet->title = $validatedData['title'];
        $timesheet->diff_work = $validatedData['diff_work'];
        $timesheet->plan_work = $validatedData['plan_work'];
        $timesheet->user_id = Auth::user()->id;
        $timesheet->save();

        return redirect('timesheet')->with('message','Created Timesheet Successfully');
    }
}
