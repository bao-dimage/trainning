<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimesheetFormRequest;
use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Time;

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

    public function show(Timesheet $timesheet){
        $tasks = Task::where('timesheet_id',$timesheet->timesheet_id)->get();
        return view('timesheet.show', compact('tasks','timesheet'));
    }
    public function store(TimesheetFormRequest $request){
        // dd($request);
        $validatedData = $request->validated();
        $timesheet = new Timesheet;
        
        $tasks = [];
        $timesheet->title = $validatedData['title'];
        $timesheet->diff_work = $validatedData['diff_work'];
        $timesheet->plan_work = $validatedData['plan_work'];
        $timesheet->user_id = Auth::user()->id;
        $timesheet->save();
        foreach ($request->tasks as $index => $task) {
            // $tasks[$index] = Task::create([
            //    'task_id' =>  $index,
            //     'content' => $task,
            //     'timesheet_id' => $timesheet->timesheet_id
            // ]);
            $tasks[$index] = new Task ;
            // $tasks[$index]->task_id = $index;
            $tasks[$index]->content = $task;
            $tasks[$index]->timesheet_id = $timesheet->timesheet_id;
            $tasks[$index]->save();
        }
        // $timesheet->save();
        // dd($timesheet);
        return redirect('timesheet')->with('message','Created Timesheet Successfully');
        // return $timesheet;
    }

    public function edit(Timesheet $timesheet){
        // return $timesheet;  
        $tasks = Task::where('timesheet_id',$timesheet->timesheet_id)->get();

        return view('timesheet.edit', compact('tasks','timesheet'));
    }

    public function update(TimesheetFormRequest $request,$timesheet){
       
        $validatedData = $request->validated();
        $timesheet = Timesheet::findorFail($timesheet);
        $tasks = Task::where('timesheet_id', $timesheet->timesheet_id)->get();
        $timesheet->title = $validatedData['title'];
        $timesheet->diff_work = $validatedData['diff_work'];
        $timesheet->plan_work = $validatedData['plan_work'];
        $timesheet->save();
        foreach ($request->tasks as $index => $task) {
           
            $tasks[$index]->content = $task;
            $tasks[$index]->timesheet_id = $timesheet->timesheet_id;
            $tasks[$index]->save();
        }
        // return $validatedData;
        // return $timesheet;
        return redirect('timesheet')->with('message','Updated Timesheet Successfully');
         
    }
    

}
