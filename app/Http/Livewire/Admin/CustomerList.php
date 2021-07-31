<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $customer = [];

    public $customerIds = [];

    protected $listeners = [
        'customerDeleted' => 'deleteCustomer',
        'deleteAll' => 'deleteAll'
    ];

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function toggleCustomer($id)
    {
        if (in_array($id, $this->customerIds)) {
            unset($this->customerIds[array_search($id, $this->customerIds)]);
            $this->customerIds = array_values($this->customerIds);
            return;
        }
        $this->customerIds[] = $id;
    }

    public function deleteAll()
    {
        User::destroy($this->customerIds);
    }

    public function show($customer)
    {
        $this->customer = $customer;
    }

    public function banned()
    {
        User::find($this->customer['id'])->update([
            'status' => false
        ]);
    }


    public function status(User $customer)
    {
        $customer->update([
            'status' => !$customer->status
        ]);
    }


    protected function filter()
    {
        $customer = User::query();

        if ($this->search) {
            $customer = $customer
                ->where('first_name', 'like', "%{$this->search}%")
                ->Orwhere('email', 'like', "%{$this->search}%")
                ->Orwhere('contact', 'like', "%{$this->search}%");
        }
        return $customer
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.customer-list')->with(['customers' => $this->filter()]);
    }
}
