<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Make;
use Livewire\Component;
use Livewire\WithPagination;

class MakeListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 4;
    public $sortField = 'id';
    public $sortAsc = true;
    public $makeIds = [];

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

    public function toggleMake($id)
    {
        if (in_array($id, $this->makeIds)) {
            unset($this->makeIds[array_search($id, $this->makeIds)]);
            $this->makeIds = array_values($this->makeIds);
            return;
        }
        $this->makeIds[] = $id;
    }

    public function deleteAll()
    {
        Make::destroy($this->makeIds);
    }

    public function status(Make $make)
    {
        $make->update([
            'status' => !$make->status
        ]);
    }

    protected function filter()
    {
        $make = Make::query();
        if ($this->search) {
            $make = $make
                ->where('title', 'like', "%{$this->search}%");
        }
        return $make
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.admin.attributes.make-listing')
            ->with(['makes'=>$this->filter()]);
    }
}
