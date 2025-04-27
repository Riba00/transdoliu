<?php

namespace App\Livewire\Trucks;

use App\Models\Truck;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class CreateTruckModal extends Component
{
    public $name = '';
    public $capacity = '';
    public $plateNumber = '';

    public function createTruck()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|numeric|min:1',
            'plateNumber' => 'required|string|max:10|unique:trucks,plate_number',
        ]);
        try {
            Truck::create([
                'name' => $this->name,
                'capacity' => $this->capacity,
                'plate_number' => $this->plateNumber,
            ]);

            $this->dispatch('close-truck-create-modal');
            $this->dispatch('refresh-trucks');
            $this->dispatch('show-toast', [
                'message' => 'Truck created successfully',
                'type' => 'success',
            ]);
            // Reset the form fields
            $this->reset(['name', 'capacity', 'plateNumber']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to create truck',
                'type' => 'error',
            ]);
            $this->dispatch('close-truck-create-modal');
        }

    }

    public function render()
    {
        return view('livewire.trucks.create-truck-modal');
    }
}
