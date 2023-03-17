<?php

namespace App\Http\Livewire\ManageUser;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.manage-user.index',['users' => $users]);
    }
}