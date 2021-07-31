<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Mileage;
use Livewire\Component;
use Livewire\WithPagination;

class MileageListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 4;
    public $sortField = 'id';
    public $sortAsc = true;
    public $mileageIds = [];

    protected $listeners = [
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

    public function toggleMileage($id)
    {
        if (in_array($id, $this->mileageIds)) {
            unset($this->mileageIds[array_search($id, $this->mileageIds)]);
            $this->mileageIds = array_values($this->mileageIds);
            return;
        }
        $this->mileageIds[] = $id;
    }

    public function deleteAll()
    {
        Mileage::destroy($this->mileageIds);
    }

    public function status(Mileage $mileage)
    {
        $mileage->update([
            'status' => !$mileage->status
        ]);
    }

    protected function filter()
    {
        $mileage = Mileage::query();
        if ($this->search) {
            $mileage = $mileage
                ->where('from', 'like', "%{$this->search}%")
                ->orWhere('to', 'like', "%{$this->search}%");
        }
        return $mileage
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.attributes.mileage-listing')
            ->with(['mileages' => $this->filter()]);
    }
}
