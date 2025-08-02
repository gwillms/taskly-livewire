<?php

namespace App\Livewire\Pages\Status;

use App\Livewire\Forms\StatusForm;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Status;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

class StatusPage extends Component
{
    use Toast;
    public StatusForm $form;
    public bool $statusModal = false;
    public ?int $editStatusId = null;

    public function save() {
        $this->form->validate();

        if ($this->editStatusId) {
            $status = Status::find($this->editStatusId);

            $status->update([
                'status' => $this->form->status,
            ]);

            $this->success('Setor atualizado com sucesso');
        } else {
            Status::create([
                'status' => $this->form->status,
            ]);

            $this->success('Status criado com sucesso');
        }

        $this->closeModal();
    }

    #[On('edit-status')]
    public function editSection($statusId)
    {
        $status = Status::find($statusId);

        if ($status) {
            $this->editStatusId = $statusId;
            $this->form->status = $status->status;
            $this->statusModal = true;
        }
    }

    public function openCreateModal()
    {
        $this->editStatusId = null;
        $this->form->reset();
        $this->statusModal = true;
    }

    public function closeModal()
    {
        $this->statusModal = false;
        $this->editStatusId = null;
        $this->form->reset();
        $this->dispatch('status-created');
    }

    #[Title('Status')]
    public function render()
    {
        return view('livewire.pages.status.status-page');
    }
}
