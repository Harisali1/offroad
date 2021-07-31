<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class ColorListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 4;
    public $sortField = 'id';
    public $sortAsc = true;
    public $colorIds = [];

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

    public function toggleColor($id)
    {
        if (in_array($id, $this->colorIds)) {
            unset($this->colorIds[array_search($id, $this->colorIds)]);
            $this->colorIds = array_values($this->colorIds);
            return;
        }
        $this->colorIds[] = $id;
    }

    public function deleteAll()
    {
        Color::destroy($this->colorIds);
    }

    public function status(Color $color)
    {
        $color->update([
            'status' => !$color->status
        ]);
    }

    protected function filter()
    {
        $color = Color::query();
        if ($this->search) {
            $color = $color
                ->where('title', 'like', "%{$this->search}%");
        }
        return $color
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.admin.attributes.color-listing')
            ->with(['colors'=>$this->filter()]);
    }
}
