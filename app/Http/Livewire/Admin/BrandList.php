<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $brandIds = [];

    protected $listeners = [
        'brandDeleted' => 'deleteBrand',
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

    public function toggleBrand($id)
    {
        if (in_array($id, $this->brandIds)) {
            unset($this->brandIds[array_search($id, $this->brandIds)]);
            $this->brandIds = array_values($this->brandIds);
            return;
        }
        $this->brandIds[] = $id;
    }

    public function deleteAll()
    {
        Brand::destroy($this->brandIds);
    }

    public function deleteBrand($id)
    {
        Brand::find($id)->delete();
    }

    public function status(Brand $brand)
    {
        $brand->update([
            'status' => !$brand->status
        ]);
    }


    protected function filter()
    {
        $brand = Brand::query();

        if ($this->search) {
            $brand = $brand
                ->where('title', 'like', "%{$this->search}%");
        }
        return $brand
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.brand-list')->with(['brands' => $this->filter()]);
    }
}
