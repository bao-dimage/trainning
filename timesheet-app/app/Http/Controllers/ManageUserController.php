<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->authorize('edit',Auth::user());
        $users = User::whereNot('role',User::ROLE_USER)->get();
        return view('user.edit', compact('users','user'));
    }

    public function update(UserFormRequest $request,$user){
       
        $validatedData = $request->validated();
        // dd($validatedData['role']);
        $user = User::findorFail($user)->update([
            'name' =>  $validatedData['name'],
            'email' =>  $validatedData['email'],
            'role' =>  $validatedData['role'],
            'manager_id' =>  $validatedData['manage'],


        ]);
        
       
        
        return redirect('manage-user')->with('message','Updated User Successfully');
         
    }
    

}
