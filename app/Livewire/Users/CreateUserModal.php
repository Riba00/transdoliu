<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class CreateUserModal extends Component
{
    public $email;
    public $name;
    public $surname;
    public $password;
    public $password_confirmation;


    public function createUser()
    {
        $this->validate([
            "email"=> "required|email|unique:users,email",
            "name"=> "required|string|max:255",
            "surname"=> "nullable|string|max:255",
            "password"=> "required|string|min:8|confirmed",
        ]);
        try {
            User::create([
                'email' => $this->email,
                'name' => $this->name,
                'surname' => $this->surname,
                'password' => bcrypt($this->password),
            ]);

            $this->dispatch('refresh-users');
            $this->dispatch('close-user-create-modal');
            $this->dispatch('show-toast', [
                'message' => 'User created successfully',
                'type' => 'success',
            ]);
            // Reset the form fields
            $this->reset(['name', 'surname', 'email', 'password', 'password_confirmation']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to create user',
                'type' => 'error',
            ]);
            $this->dispatch('close-create-user-modal');
        }

    }
    public function render()
    {
        return view('livewire.users.create-user-modal');
    }
}
