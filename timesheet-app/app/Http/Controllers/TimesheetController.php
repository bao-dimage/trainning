<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimesheetFormRequest;
use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Timesheet;
use App\Models\User;

use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Time;

use App\Repositories\Interfaces\TimesheetRepositoryInterface;

class TimesheetController extends Controller
{
    //
    private $timesheetRepository;
    public function __construct(TimesheetRepositoryInterface $timesheetRepository)
    {
        $this->middleware('auth');
        $this->timesheetRepository = $timesheetRepository;
        
    }

    public function index(){
        

        return view('timesheet');
   }
    public function create(){
       
         return view('timesheet.create');
    }

    public function show(Timesheet $timesheet){
        // $tasks = Task::where('timesheet_id',$timesheet->timesheet_id)->get();
        $tasks = $this->timesheetRepository->findTasks($timesheet);
        $this->authorize('view', $timesheet);

        return view('timesheet.show', compact('tasks','timesheet'));
    }
    public function store(TimesheetFormRequest $request){
        // dd($request);
        $validatedData = $request->validated();
        
        // $timesheet = new Timesheet;
        $user = Auth::user();
        $timesheet = $user->timesheets()->create([
            'title' =>  $validatedData['title'],
            'diff_work' =>  $validatedData['diff_work'],
            'plan_work' =>  $validatedData['plan_work'],
        ]);
        $tasks = [];
      
        foreach ($validatedData['tasks'] as $task) {
           
            $timesheet->tasks = $timesheet->tasks()->create([
               
                'content' => $task,
                
            ]) ;
           }       
        return redirect('timesheet')->with('message','Created Timesheet Successfully');
        
    }

    public function edit(Timesheet $timesheet){
        // return $timesheet;  
        $this->authorize('edit', $timesheet);

        $tasks = Task::where('timesheet_id',$timesheet->timesheet_id)->get();

        return view('timesheet.edit', compact('tasks','timesheet'));
    }

    public function update(TimesheetFormRequest $request,$timesheet){
        // $this->authorize('update', $timesheet);
        $validatedData = $request->validated();
        $timesheet = Timesheet::findorFail($timesheet);
        $tasks = Task::where('timesheet_id', $timesheet->timesheet_id)->get();
        $timesheet->title = $validatedData['title'];
        $timesheet->diff_work = $validatedData['diff_work'];
        $timesheet->plan_work = $validatedData['plan_work'];
        $timesheet->save();
       
        foreach ($request->tasks as $task) {
           
            // $tasks[$index]->content = $task;
            // $tasks[$index]->timesheet_id = $timesheet->timesheet_id;
            // $tasks[$index]->save();
            $timesheet->tasks = $timesheet->tasks()->update([
               
                'content' => $task,
                
            ]) ;
        }
        // return $validatedData;
        // return $timesheet;
        return redirect('timesheet')->with('message','Updated Timesheet Successfully');
         
    }
    

}