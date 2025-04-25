<?php

namespace App\Livewire\Trucks;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Truck;

class TrucksTable extends Component
{

    #[On("refresh-trucks")]
    public function refreshTrucks()
    {
        
    }

    #[On("delete-truck")]
    public function deleteTruck($truckId)
    {
        try {
            $truck = Truck::find($truckId);

            // Check if the truck exists
            if ($truck) {
                // Delete the truck
                $truck->delete();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        // Find the truck by ID

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
