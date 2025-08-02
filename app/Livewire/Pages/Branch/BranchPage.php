<?php

namespace App\Livewire\Pages\Branch;

use App\Livewire\Forms\BranchForm;
use App\Models\Branch;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

class BranchPage extends Component
{
    use Toast;
    public BranchForm $form;
    public bool $branchModal = false;
    public $estadoList = [];
    public ?int $editingBranchId = null;

    public function mount()
    {
        $this->estadoList = collect([
            1 => 'Mato Grosso',
            2 => 'Paraná',
            3 => 'Rio Grande do Sul',
            4 => 'Santa Catarina',
        ])->map(fn($name, $id) => (object) ['id' => $id, 'name' => $name])->values();
    }

    public function save() {
        $this->form->validate();

        if ($this->editingBranchId) {
            $branch = Branch::find($this->editingBranchId);
            $branch->update([
                'filial' => $this->form->filial,
                'sigla' => $this->form->sigla,
                'estado' => $this->form->estado,
            ]);

            $this->success('Filial atualizada com sucesso');
        } else {
            Branch::create([
                'filial' => $this->form->filial,
                'sigla' => $this->form->sigla,
                'estado' => $this->form->estado,
            ]);

            $this->success('Filial criada com sucesso');
        }

        $this->closeModal();
    }

    #[On('edit-branch')]
    public function editUser($branchId)
    {
        $branch = Branch::find($branchId);

        if ($branch) {
            $this->editingBranchId = $branchId;
            $this->form->filial = $branch->filial;
            $this->form->sigla = $branch->sigla;
            $this->form->estado = $branch->estado;
            $this->branchModal = true;
        }
    }

    public function openCreateModal()
    {
        $this->editingBranchId = null;
        $this->form->reset();
        $this->branchModal = true;
    }

    public function closeModal()
    {
        $this->branchModal = false;
        $this->editingBranchId = null;
        $this->form->reset();
    }

    #[Title('Filiais')]
    public function render()
    {
        return view('livewire.pages.branch.branch-page');
    }
}
