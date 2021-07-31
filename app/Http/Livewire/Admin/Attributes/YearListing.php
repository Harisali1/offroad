<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Year;
use Livewire\Component;
use Livewire\WithPagination;

class YearListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 4;
    public $sortField = 'id';
    public $sortAsc = true;
    public $yearIds = [];

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

    public function toggleYear($id)
    {
        if (in_array($id, $this->yearIds)) {
            unset($this->yearIds[array_search($id, $this->yearIds)]);
            $this->yearIds = array_values($this->yearIds);
            return;
        }
        $this->yearIds[] = $id;
    }

    public function deleteAll()
    {
        Year::destroy($this->yearIds);
    }

    public function status(Year $year)
    {
        $year->update([
            'status' => !$year->status
        ]);
    }

    protected function filter()
    {
        $year = Year::query();
        if ($this->search) {
            $year = $year
                ->where('title', 'like', "%{$this->search}%");
        }
        return $year
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.admin.attributes.year-listing')
            ->with(['years'=>$this->filter()]);
    }
}
