<?php

namespace App\Livewire\Pages\Task;

use App\Livewire\Forms\TaskForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

class TaskPage extends Component
{
    use Toast;
    public TaskForm $form;
    public bool $taskModal = false;
    public ?int $editTaskId = null;

    #[Title('Chamados')]
    public function render()
    {
        return view('livewire.pages.task.task-page');
    }
}
