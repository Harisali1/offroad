<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class AdminList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $adminIds = [];

    protected $listeners = [
        'adminDeleted' => 'deleteAdmin',
        'deleteAll' => 'deleteAll',
        'status' => 'status'
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

    public function toggleAdmin($id)
    {
        if (in_array($id, $this->adminIds)) {
            unset($this->adminIds[array_search($id, $this->adminIds)]);
            $this->adminIds = array_values($this->adminIds);
            return;
        }
        $this->adminIds[] = $id;
    }

    public function deleteAll()
    {
        Admin::destroy($this->adminIds);
    }

    public function deleteAdmin($id)
    {
        Admin::find($id)->delete();
    }


    public function status(Admin $admin)
    {
        $admin->update([
            'status' => !$admin->status
        ]);
    }


    protected function filter()
    {
        $admin = Admin::query();

        if ($this->search) {
            $admin = $admin
                ->where('name', 'like', "%{$this->search}%")
                ->Orwhere('email', 'like', "%{$this->search}%")
                ->Orwhere('designation', 'like', "%{$this->search}%");
        }
        return $admin
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.admin-list')->with(['admins' => $this->filter()]);
    }
}
