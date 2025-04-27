<?php

namespace App\Livewire\Trucks;

use App\Models\Truck;
use Livewire\Component;
use Livewire\Attributes\On;

class EditTruckModal extends Component
{
    public $isEditTruckModalOpen = false;
    public $truck;
    public $name;
    public $plateNumber;
    public $capacity;

    #[On("open-edit-truck-modal")]
    public function openEditTruckModal(Truck $truck)
    {
        if (!$truck) {
            return;
        }

        $this->truck = $truck;

        $this->name = $truck->name;
        $this->plateNumber = $truck->plate_number;
        $this->capacity = $truck->capacity;

        $this->isEditTruckModalOpen = true;
    }

    public function editTruck()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'plateNumber' => [
                'required',
                'string',
                'max:255',
                'unique:trucks,plate_number,' . $this->truck->id,
            ],
            'capacity' => 'required|numeric|min:0',
        ]);

        $this->truck->update([
            'name' => $this->name,
            'plate_number' => $this->plateNumber,
            'capacity' => $this->capacity,
        ]);

        $this->dispatch('refresh-trucks');
        $this->dispatch('truck-updated');
        
        $this->isEditTruckModalOpen = false;
    }


    public function render()
    {
        return view('livewire.trucks.edit-truck-modal');
    }
}
