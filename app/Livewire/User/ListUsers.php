<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class ListUsers extends Component
{
    public $search = "";
    public function render()
    {

        if (strlen($this->search) > 2) {
            $users = User::where('first_name', 'like', "%{$this->search}")->get();
        } else {
            $users = User::all();
        }
        return view('livewire.user.list-users', ['users' => $users])->layout('layouts.dashboard.main');
    }
}
