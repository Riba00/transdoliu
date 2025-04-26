<?php

namespace App\Livewire\Trucks;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Truck;
use Log;

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

            // Check if the truck exists
            if ($truck) {
                // Delete the truck
                $truck->delete();

                $this->dispatch('truck-deleted');
                $this->dispatch('close-delete-truck-modal');
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }



    public function render()
    {
        // Fetch trucks from the database
        $trucks = Truck::orderBy('plate_number')->paginate(10); // Adjust the pagination as needed

        // For demonstration, using a static array

        return view('livewire.trucks.trucks-table', [
            'trucks' => $trucks,
        ]);
    }
}
