<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Models;
use Livewire\Component;
use Livewire\WithPagination;

class ModelListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 4;
    public $sortField = 'id';
    public $sortAsc = true;
    public $modelIds = [];

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

    public function toggleModel($id)
    {
        if (in_array($id, $this->modelIds)) {
            unset($this->modelIds[array_search($id, $this->modelIds)]);
            $this->modelIds = array_values($this->modelIds);
            return;
        }
        $this->modelIds[] = $id;
    }

    public function deleteAll()
    {
        Models::destroy($this->modelIds);
    }

    public function status(Models $model)
    {
        $model->update([
            'status' => !$model->status
        ]);
    }

    protected function filter()
    {
        $models = Models::query();
        if ($this->search) {
            $models = $models
                ->where('title', 'like', "%{$this->search}%");
        }
        return $models
            ->with('make')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.admin.attributes.model-listing')
            ->with(['models'=>$this->filter()]);
    }
}
