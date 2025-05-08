<?php

namespace App\Livewire\Locations;

use App\Models\Location;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class CreateLocationModal extends Component
{
    public $name;

    public function createLocation()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:locations,name',
        ]);

        try {
            Location::create([
                'name' => $this->name,
            ]);

            $this->dispatch('close-location-create-modal');
            $this->dispatch('refresh-locations');
            $this->dispatch('show-toast', [
                'message' => 'Location created successfully',
                'type' => 'success',
            ]);
            // Reset the form fields
            $this->reset(['name']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to create location',
                'type' => 'error',
            ]);
            $this->dispatch('close-location-create-modal');
        }

    }

    public function render()
    {
        return view('livewire.locations.create-location-modal');
    }
}
