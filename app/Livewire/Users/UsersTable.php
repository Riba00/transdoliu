<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class UsersTable extends Component
{
    public int $deleteUserId = 0;

    #[On("refresh-users")]
    public function refreshUsers()
    {
        
    }

    #[On("delete-user")]
    public function deleteUser()
    {
        try {
            $user = User::find($this->deleteUserId);
            // Delete the user
            $user->delete();

            $this->dispatch('show-toast', [
                'message' => 'User deleted successfully',
                'type' => 'success',
            ]);

            $this->dispatch('close-delete-user-modal');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to delete user',
                'type' => 'error',
            ]);
            $this->dispatch('close-delete-user-modal');
        }
    }



    public function render()
    {
        // Fetch users from the database
        $users = User::all(); // Replace with your actual query to fetch users

        // For demonstration, using a static array

        return view('livewire.users.users-table', [
            'users' => $users,
        ]);
    }
}
