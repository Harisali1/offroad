<?php

namespace App\Http\Livewire\Admin;

use App\Models\SmartAssistant;
use Livewire\Component;
use Livewire\WithPagination;

class SmartAssistantListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 4;
    public $sortField = 'id';
    public $sortAsc = true;
    public $smart_assistant=[];

    public $smart_assistantIds = [];

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

    public function toggleSmartAssistant($id)
    {
        if (in_array($id, $this->smart_assistantIds)) {
            unset($this->smart_assistantIds[array_search($id, $this->smart_assistantIds)]);
            $this->smart_assistantIds = array_values($this->smart_assistantIds);
            return;
        }
        $this->smart_assistantIds[] = $id;
    }

    public function deleteAll()
    {
        SmartAssistant::destroy($this->smart_assistantIds);
    }

    public function status(SmartAssistant $smartAssistant)
    {
        $smartAssistant->update([
            'status' => !$smartAssistant->status
        ]);
    }

    protected function filter()
    {
        $smart_assistant = SmartAssistant::query();
        if ($this->search) {
            $smart_assistant = $smart_assistant
                ->where('title', 'like', "%{$this->search}%");
        }
        return $smart_assistant
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function show(SmartAssistant $smartAssistant)
    {
        $this->smart_assistant=$smartAssistant;
    }

    public function render()
    {
        return view('livewire.admin.smart-assistant-listing')
            ->with(['smart_assistants' => $this->filter()]);
    }
}
