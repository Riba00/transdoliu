<?php

namespace App\Livewire\Trucks;

use Livewire\Component;
use App\Models\Truck;
use Log;

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
            $this->dispatch('truck-created');

            // Reset the form fields
            $this->reset(['name', 'capacity', 'plateNumber']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

    }

    public function render()
    {
        return view('livewire.trucks.create-truck-modal');
    }
}
