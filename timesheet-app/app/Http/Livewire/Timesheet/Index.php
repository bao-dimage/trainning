<?php

namespace App\Http\Livewire\Timesheet;

use App\Models\Timesheet;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Index extends Component
{   
    public $timesheet;
    public function render()
    {   
        $user_id = Auth::user()->id;
        $user_employees = User::where('manager_id', $user_id)->get('id');
        // echo $user_id;
        $timesheets = Timesheet::where('user_id',$user_id)->orWhereIn('user_id',$user_employees) ->get();
        
        // $timesheets = Timesheet::all();
   
        
        return view('livewire.timesheet.index',['timesheets' => $timesheets]);
    }
    public function deleteTimesheet($timesheet){
        $this->$timesheet = $timesheet;
    }

    

    public function destroyTimesheet($timesheet)
    {
        // delete
        $timesheet = Timesheet::findOrFail($timesheet);
        $timesheet->delete();

        session() ->flash('message','Timesheet Deleted');
       
    }
}
