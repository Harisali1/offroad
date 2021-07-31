<?php

namespace App\Http\Livewire\Admin;

use App\Models\Addon;
use Livewire\Component;
use Livewire\WithPagination;

class AddonList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $adddonIds = [];

    protected $listeners = [
        'addonDeleted' => 'deleteAddon',
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

    public function toggleAddon($id)
    {
        if (in_array($id, $this->adddonIds)) {
            unset($this->adddonIds[array_search($id, $this->adddonIds)]);
            $this->adddonIds = array_values($this->adddonIds);
            return;
        }
        $this->adddonIds[] = $id;
    }

    public function deleteAll()
    {
        Addon::destroy($this->adddonIds);
    }

    public function deleteAddon($id)
    {
        Addon::find($id)->delete();
    }

    public function status(Addon $addon)
    {
        $addon->update([
            'status' => !$addon->status
        ]);
    }

    protected function filter()
    {
        $addon = Addon::query();
        if ($this->search) {
            $addon = $addon
                ->where('title', 'like', "%{$this->search}%");
        }
        return $addon
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.addon-list')->with(['addons' => $this->filter()]);
    }
}
