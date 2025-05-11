<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Location;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class CreateCustomerModal extends Component
{
    public $name = '';
    public $location_id = '';
    public $locations;

    #[On('refresh-locations')]
    public function refreshLocations()
    {
        $this->locations = Location::all();
    }

    public function mount()
    {
        $this->locations = Location::all();
    }

    public function createCustomer()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:customers,name',
            'location_id' => 'required|exists:locations,id',
        ],
        [
            'location_id.required' => 'The location field is required.',
        ]);

        try {
            Customer::create([
                'name' => $this->name,
                'location_id' => $this->location_id,
            ]);

            $this->dispatch('close-customer-create-modal');
            $this->dispatch('refresh-customers');
            $this->dispatch('show-toast', [
                'message' => 'Customer created successfully',
                'type' => 'success',
            ]);
            // Reset the form fields
            $this->reset(['name', 'capacity', 'plateNumber']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to create customer',
                'type' => 'error',
            ]);
            $this->dispatch('close-customer-create-modal');
        }
    }

    public function render()
    {

        return view('livewire.customers.create-customer-modal', [
            'locations' => $this->locations,
        ]);
    }
}
