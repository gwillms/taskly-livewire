<?php

namespace App\Livewire\Pages\Task;

use App\Livewire\Forms\TaskForm;
use App\Models\Branch;
use App\Models\Section;
use App\Models\Status;
use App\Models\UserModel;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Mary\Traits\Toast;
use Mary\Traits\WithMediaSync;

class TaskPage extends Component
{
    use Toast, WithFileUploads, WithMediaSync;
    public TaskForm $form;
    public $statusList = [];
    public $employeeList = [];
    public $filialList = [];
    public $setorList = [];
    public bool $taskModal = false;
    public ?int $editTaskId = null;

    #[Rule(['files.*' => 'image|max:1024'])]
    public array $files = [];

    public $anexo;
    public function mount() {
        $this->loadLists();

        $this->anexo = collect();
        $this->files = [];
    }
    private function loadLists()
    {
        $this->setorList = Section::where('active', true)
            ->orderBy('setor')
            ->get()
            ->map(fn($item) => (object) [
                'id' => $item->id,
                'name' => $item->setor,
            ])
            ->values();

        $this->filialList = Branch::where('active', true)
            ->orderBy('filial')
            ->get()
            ->map(fn($item) => (object) [
                'id' => $item->id,
                'name' => $item->filial,
            ])
            ->values();

        $this->employeeList = UserModel::where('active', true)
            ->orderBy('nome')
            ->get()
            ->map(fn($item) => (object) [
                'id' => $item->id,
                'name' => $item->nome,
            ])
            ->values();

        $this->statusList = Status::where('active', true)
            ->orderBy('id')
            ->get()
            ->map(fn($item) => (object) [
                'id' => $item->id,
                'name' => $item->status,
            ])
            ->values();
    }

    #[Title('Chamados')]
    public function render()
    {
        return view('livewire.pages.task.task-page');
    }
}
