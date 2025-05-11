<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Location;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class EditCustomerModal extends Component
{
    public $isEditCustomerModalOpen = false;
    public $customer;
    public $name;
    public $location_id;
    public $locations = [];

    #[On("open-edit-customer-modal")]
    public function openEditTruckModal(Customer $customer)
    {
        if (!$customer) {
            return;
        }

        $this->customer = $customer;

        $this->name = $customer->name;
        $this->location_id = $customer->location_id;

        $this->locations = Location::all();

        $this->isEditCustomerModalOpen = true;
    }

    public function editCustomer()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:customers,name,' . $this->customer->id,
            'location_id' => 'required|exists:locations,id',
        ]);

        try {
            $this->customer->update([
                'name' => $this->name,
                'location_id' => $this->location_id,
            ]);

            $this->dispatch('refresh-customers');
            $this->dispatch('show-toast', [
                'message' => 'Customer updated successfully',
                'type' => 'success',
            ]);

            $this->isEditCustomerModalOpen = false;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to update customer',
                'type' => 'error',
            ]);
            $this->isEditCustomerModalOpen = false;
        }
    }


    public function render()
    {
        return view('livewire.customers.edit-customer-modal', [
            'locations' => $this->locations,
        ]);
    }
}
