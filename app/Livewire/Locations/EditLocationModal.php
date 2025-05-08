<?php

namespace App\Livewire\Locations;

use Livewire\Component;
use App\Models\Location;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class EditLocationModal extends Component
{
    public $isEditLocationModalOpen = false;
    public $location;
    public $name;

    #[On("open-edit-location-modal")]
    public function openEditTruckModal(Location $location)
    {
        if (!$location) {
            return;
        }

        $this->location = $location;

        $this->name = $location->name;

        $this->isEditLocationModalOpen = true;
    }

    public function editLocation()
    {
        $this->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:locations,name,' . $this->location->id,
            ],
        ]);
        
        try {
            $this->location->update([
                'name' => $this->name,
            ]);

            $this->dispatch('refresh-locations');
            $this->dispatch('show-toast', [
                'message' => 'Truck updated successfully',
                'type' => 'success',
            ]);

            $this->isEditLocationModalOpen = false;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to update location',
                'type' => 'error',
            ]);
            $this->isEditLocationModalOpen = false;
        }
    }

    public function render()
    {
        return view('livewire.locations.edit-location-modal');
    }
}
