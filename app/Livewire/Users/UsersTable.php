<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class UsersTable extends Component
{
    public int $deleteTruckId = 0;

    #[On("refresh-users")]
    public function refreshUsers()
    {
        
    }

    // #[On("delete-truck")]
    // public function deleteTruck()
    // {
    //     try {
    //         $truck = Truck::find($this->deleteTruckId);

    //         // Check if the truck exists
    //         if ($truck) {
    //             // Delete the truck
    //             $truck->delete();

    //             $this->dispatch('truck-deleted');
    //             $this->dispatch('close-delete-truck-modal');
    //         }
    //     } catch (\Throwable $th) {
    //         Log::error($th->getMessage());
    //     }
    // }



    public function render()
    {
        // Fetch users from the database
        $users = User::paginate(10);

        // For demonstration, using a static array

        return view('livewire.users.users-table', [
            'users' => $users,
        ]);
    }
}
