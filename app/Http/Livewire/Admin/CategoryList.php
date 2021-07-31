<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $categoryIds = [];

    protected $listeners = [
        'categoryDeleted' => 'deleteCategory',
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

    public function toggleCategory($id)
    {
        if (in_array($id, $this->categoryIds)) {
            unset($this->categoryIds[array_search($id, $this->categoryIds)]);
            $this->categoryIds = array_values($this->categoryIds);
            return;
        }
        $this->categoryIds[] = $id;
    }

    public function deleteAll()
    {
        Category::destroy($this->categoryIds);
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
    }

    public function status(Category $category)
    {
        $category->update([
            'status' => !$category->status
        ]);
    }


    protected function filter()
    {
        $category = Category::query();

        if ($this->search) {
            $category = $category
                ->where('title', 'like', "%{$this->search}%");
        }
        return $category
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.category-list')->with(['categories' => $this->filter()]);
    }
}
