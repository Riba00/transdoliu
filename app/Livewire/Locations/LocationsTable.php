<?php

namespace App\Livewire\Locations;

use Livewire\Component;
use App\Models\Location;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class LocationsTable extends Component
{
    public $deleteLocationId = 0;


    #[On("refresh-locations")]
    public function refreshTrucks()
    {

    }


    #[On("delete-location")]
    public function deleteLocation()
    {
        try {
            $location = Location::find($this->deleteLocationId);
            // Delete the location
            $location->delete();

            $this->dispatch('show-toast', [
                'message' => 'Location deleted successfully',
                'type' => 'success',
            ]);

            $this->dispatch('close-delete-location-modal');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to delete location',
                'type' => 'error',
            ]);
            $this->dispatch('close-delete-location-modal');
        }
    }
    
    public function render()
    {
        $locations = Location::all();

        return view('livewire.locations.locations-table', [
            'locations' => $locations,
        ]);
    }
}
