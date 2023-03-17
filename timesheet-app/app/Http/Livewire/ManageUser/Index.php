<?php

namespace App\Http\Livewire\ManageUser;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $user_id;

    public function deleteUser($user_id){
      
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
