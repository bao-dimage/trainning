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
        $user = Auth::user();
        if ($user->role === User::ROLE_ADMIN) 
        {
            $timesheets = Timesheet::all();
        }
        elseif ($user->role === User::ROLE_MANAGER)
        {
            $user_employees = User::where('manager_id', $user->id)->get('id');
            $timesheets = Timesheet::where('user_id',$user->id)->orWhereIn('user_id',$user_employees) ->get(); 
        }
        else if ($user->role === User::ROLE_USER)
        {
            $timesheets = Timesheet::where('user_id',$user->id)->get();
        }
        
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
