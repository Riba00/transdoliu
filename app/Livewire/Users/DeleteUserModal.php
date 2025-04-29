<?php

namespace App\Livewire\Users;

use Livewire\Component;

class DeleteUserModal extends Component
{

    public $user_id;
    public function render()
    {
        return view('livewire.users.delete-user-modal');
    }
}
