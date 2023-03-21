<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TimesheetRepositoryInterface;
use App\Models\Timesheet;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
class TimesheetRepository implements TimesheetRepositoryInterface
{

    

    public function storeTimesheet($data)
    {
        $user = Auth::user();
        $timesheet = $user->timesheets()->create([
            'title' =>  $data['title'],
            'diff_work' =>  $data['diff_work'],
            'plan_work' =>  $data['plan_work'],
        ]);
        $tasks = [];
      
        foreach ($data['tasks'] as $task) {
           
            $timesheet->tasks = $timesheet->tasks()->create([
               
                'content' => $task,
                
            ]) ;
           }       
        return $timesheet;
    }

    public function findTimesheet($id)
    {
        return Timesheet::find($id);
    }

    public function findTasks($timesheet){
        return $tasks = Task::where('timesheet_id',$timesheet->timesheet_id)->get();
    }

    public function updateTimesheet($data, $timesheet)
    {
        $timesheet = Timesheet::findorFail($timesheet);
        $tasks = Task::where('timesheet_id', $timesheet->timesheet_id)->get();
       
            $timesheet->title = $data['title'];
            $timesheet->diff_work = $data['diff_work'];
            $timesheet->plan_work = $data['plan_work'];
            $timesheet->save();
    
        foreach ($data['tasks'] as $task) {
           
            // $tasks[$index]->content = $task;
            // $tasks[$index]->timesheet_id = $timesheet->timesheet_id;
            // $tasks[$index]->save();
            $timesheet->tasks = $timesheet->tasks()->update([
               
                'content' => $task,
                
            ]) ;
        }
    }

    public function destroyTimesheet($id)
    {
        $timesheet = Timesheet::find($id);
        $timesheet->delete();
    }

    
}