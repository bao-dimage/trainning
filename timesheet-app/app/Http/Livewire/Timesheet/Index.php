<?php

namespace App\Http\Livewire\Timesheet;

use App\Models\Timesheet;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {   
        $user_id = Auth::user()->id;
        // echo $user_id;
        $timesheets = Timesheet::where('user_id',$user_id)->get();
        

   
        
        return view('livewire.timesheet.index',['timesheets' => $timesheets]);
    }
}
