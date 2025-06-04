<?php

namespace App\Livewire\Pages\Branch;

use App\Livewire\Forms\BranchForm;
use App\Models\Branch;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

class BranchPage extends Component
{
    use Toast;
    public BranchForm $form;
    public bool $branchModal = false;

    public function save() {
        $this->form->validate();

        Branch::create([
            'filial' => $this->form->filial,
            'sigla' => $this->form->sigla
        ]);

        $this->success('Filial criada com sucesso');

        $this->dispatch('branch-created');
        $this->form->reset();
        $this->branchModal = false;
    }

    #[Title('Filiais')]
    public function render()
    {
        return view('livewire.pages.branch.branch-page');
    }
}
