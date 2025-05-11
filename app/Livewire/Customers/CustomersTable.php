<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class CustomersTable extends Component
{
    public int $deleteCustomerId = 0;

    #[On("refresh-customers")]
    public function refreshCustomers()
    {
        
    }

    #[On("delete-customer")]
    public function deleteCustomer()
    {
        try {
            $customer = Customer::find($this->deleteCustomerId);
            // Delete the customer
            $customer->delete();

            $this->dispatch('show-toast', [
                'message' => 'Truck deleted successfully',
                'type' => 'success',
            ]);

            $this->dispatch('close-delete-customer-modal');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $this->dispatch('show-toast', [
                'message' => 'Failed to delete customer',
                'type' => 'error',
            ]);
            $this->dispatch('close-delete-customer-modal');
        }
    }

    public function render()
    {
        $customers = Customer::orderBy('name')->get();

        return view('livewire.customers.customers-table', [
            'customers' => $customers,
        ]);
    }
}
