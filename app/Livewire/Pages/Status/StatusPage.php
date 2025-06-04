<?php

namespace App\Livewire\Pages\Status;

use App\Livewire\Forms\StatusForm;
use Livewire\Component;
use App\Models\Status;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

class StatusPage extends Component
{
    use Toast;
    public StatusForm $form;
    public bool $statusModal = false;

    public function save() {
        $this->form->validate();

        Status::create([
            'status' => $this->form->status,
        ]);

        $this->success('Status criado com sucesso');

        $this->dispatch('status-created');
        $this->statusModal = false;
        $this->form->reset();
    }

    #[Title('Status')]
    public function render()
    {
        return view('livewire.pages.status.status-page');
    }
}
