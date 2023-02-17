<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    //
    public function create(){
        
         return view('timesheet.create');
    }
}
