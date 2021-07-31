<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class PageList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;

    public $pageIds = [];

    protected $listeners = [
        'pageDeleted' => 'deletePage',
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

    public function togglePage($id)
    {
        if (in_array($id, $this->pageIds)) {
            unset($this->pageIds[array_search($id, $this->pageIds)]);
            $this->pageIds = array_values($this->pageIds);
            return;
        }
        $this->pageIds[] = $id;
    }

    public function deleteAll()
    {
        Page::destroy($this->pageIds);
    }

    public function deletePage($id)
    {
        Page::find($id)->delete();
    }

    public function status(Page $page)
    {
        $page->update([
            'status' => !$page->status
        ]);
    }


    protected function filter()
    {
        $page = Page::query();

        if ($this->search) {
            $page = $page
                ->where('title', 'like', "%{$this->search}%");
        }
        return $page
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.page-list')->with(['pages' => $this->filter()]);
    }
}
