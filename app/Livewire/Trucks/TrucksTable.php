<?php

namespace App\Livewire\Trucks;

use App\Models\Truck;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\Throw_;

class TrucksTable extends Component
{
    public int $deleteTruckId = 0;

    #[On("refresh-trucks")]
    public function refreshTrucks()
    {

    }

    #[On("delete-truck")]
    public function deleteTruck()
    {
        try {
            $truck = Truck::find($this->deleteTruckId);
            // Delete the truck
            $truck->delete();

            $this->dispatch('show-toast', [
                'message' => 'Truck deleted successfully',
                'type' => 'success',
            ]);

            $this->dispatch('close-delete-truck-modal');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to delete truck',
                'type' => 'error',
            ]);
            $this->dispatch('close-delete-truck-modal');
        }
    }

    public function render()
    {
        // Fetch trucks from the database
        $trucks = Truck::orderBy('plate_number')->get();

        // For demonstration, using a static array

        return view('livewire.trucks.trucks-table', [
            'trucks' => $trucks,
        ]);
    }
}
