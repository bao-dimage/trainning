<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchFormRequest;
use App\Http\Requests\TimesheetFormRequest;
use App\Models\Task;
use App\Services\TimesheetService;
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
    protected $timesheetService;
    private $timesheetRepository;
    public function __construct(TimesheetService $timesheetService)
    {
        $this->middleware('auth');
        $this->timesheetService = $timesheetService;
        
    }

    public function index(){
        

        return view('timesheet');
   }
    public function create(){
       
         return view('timesheet.create');
    }

    public function show(Timesheet $timesheet){
        
        $tasks =  $this->timesheetService->showTimesheetData($timesheet);
        $this->authorize('view', $timesheet);

        return view('timesheet.show', compact('tasks','timesheet'));
    }
    public function store(TimesheetFormRequest $request){
        // dd($request);
        $this->timesheetService->storeTimesheetData($request);
        
        return redirect('timesheet')->with('message','Created Timesheet Successfully');
        
    }

    public function edit(Timesheet $timesheet){
        // return $timesheet;  
        $this->authorize('edit', $timesheet);

        $this->timesheetService->showTimesheetData($timesheet);
       


        return view('timesheet.edit', compact('tasks','timesheet'));
    }

    public function update(TimesheetFormRequest $request,$timesheet){
        // $this->authorize('update', $timesheet);

        $this->timesheetService->updateTimesheetData($request,$timesheet);
        
        return redirect('timesheet')->with('message','Updated Timesheet Successfully');
         
    }

    public function search(SearchFormRequest $request){
        $timesheets = $this->timesheetService->searchTimesheetData($request);
        // dd($timesheets);
        return view('timesheet.search',compact('timesheets'));
    }
    

}