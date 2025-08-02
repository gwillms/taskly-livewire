<?php

namespace App\Livewire\Pages\Status\Includes;

use App\Models\Status;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class StatusDataForm extends Component
{
    use Toast;
    public $selectedStatusId;
    public $showDeleteModal = false;

    #[On('status-created')]
    public function loadStatus()
    {
        Status::where('active', 1)->get();
    }

    public function edit($statusId)
    {
        $this->dispatch('edit-status', statusId: $statusId);
    }
    public function confirmDelete($statusId)
    {
        $this->selectedStatusId = $statusId;
        $this->showDeleteModal = true;
    }
    public function delete()
    {
        if ($this->selectedStatusId) {
            $status = Status::find($this->selectedStatusId);

            if ($status) {
                $status->delete();

                $this->success('Status excluído com sucesso');
            }
        }

        $this->showDeleteModal = false;
        $this->selectedStatusId = null;
    }
    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->selectedStatusId = null;
    }
    public function render()
    {
        $status = Status::where('active', 1)->get();

        $headers = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'status', 'label' => 'Status'],
            ['key' => 'actions', 'label' => ''],
        ];

        return view('livewire.pages.status.includes.status-data-form', compact('status', 'headers'));
    }
}
