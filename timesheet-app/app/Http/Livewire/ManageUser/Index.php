<?php

namespace App\Http\Livewire\ManageUser;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user_id;
    use AuthorizesRequests;

    public function deleteUser($user_id){
       
        $this->authorize('delete',Auth::user());
        $this->user_id = $user_id;
     
    }

    

    public function destroyUser()
    {
        // delete
        // dd($this->user);
        $user = User::find($this->user_id);
        

        // dd($User);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal');
   
        

        session() ->flash('message','User Deleted');
       
    }
    public function render()
    {
        $users = User::all();
        return view('livewire.manage-user.index',['users' => $users]);
    }
}
