<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class EditUserModal extends Component
{
    public $isEditUserModalOpen = false;

    public $user;
    public $name = "";
    public $surname = "";
    public $email = "";
    public $password = "";
    public $password_confirmation = "";


    #[On('open-edit-user-modal')]
    public function openEditUserModal(User $user)
    {
        $this->resetValidation();

        $this->user = $user;

        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->email = $user->email;

        $this->password = "";
        $this->password_confirmation = "";

        $this->isEditUserModalOpen = true;
    }

    public function editUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $this->user->update([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);

            $this->dispatch('refresh-users');
            $this->dispatch('show-toast', [
                'message' => 'User updated successfully',
                'type' => 'success',
            ]);

            $this->isEditUserModalOpen = false;
            $this->reset(['name', 'surname', 'email', 'password', 'password_confirmation']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->isEditUserModalOpen = false;
            $this->dispatch('show-toast', [
                'message' => 'Failed to update user',
                'type' => 'error',
            ]);
            $this->reset(['name', 'surname', 'email', 'password', 'password_confirmation']);
        }
    }

    public function render()
    {
        return view('livewire.users.edit-user-modal');
    }
}
