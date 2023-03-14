<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(){
        

        return view('manage-user');
   }
    public function show(User $user){
         return view('user.show', compact('user'));
    }

    public function edit(User $user){
        // return $user;  
        // $this->authorize('edit', $user);
        $users = User::whereNot('role',User::ROLE_USER)->get();
        return view('user.edit', compact('users','user'));
    }

    public function update(UserFormRequest $request,$user){
        // $this->authorize('update', $timesheet);
        $validatedData = $request->validated();
        $user = User::findorFail($user);
        // $tasks = Task::where('timesheet_id', $timesheet->timesheet_id)->get();
       
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $user->manager_id = $validatedData['manage'];

        $user->save();
        
        return redirect('manage-user')->with('message','Updated User Successfully');
         
    }
    

}
