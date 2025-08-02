<?php

namespace App\Livewire\Pages\Branch\Includes;

use App\Models\Branch;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class BranchDataForm extends Component
{
    use Toast;
    public $selectedBranchId;
    public $showDeleteModal = false;
    #[On('branch-created')]
    public function loadBranches()
    {
        Branch::where('active', 1)->get();
    }
    public function edit($branchId)
    {
        $this->dispatch('edit-branch', branchId: $branchId);
    }
    public function confirmDelete($branchId)
    {
        $this->selectedBranchId = $branchId;
        $this->showDeleteModal = true;
    }
    public function delete()
    {
        if ($this->selectedBranchId) {
            $branch = Branch::find($this->selectedBranchId);

            if ($branch) {
                $branch->delete();

                $this->success('Usuário excluído com sucesso');
            }
        }

        $this->showDeleteModal = false;
        $this->selectedBranchId = null;
    }
    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->selectedBranchId = null;
    }
    public function render()
    {
        $branches = Branch::where('active', 1)
            ->orderBy('filial')
            ->get();

        $headers = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'filial', 'label' => 'Filial'],
            ['key' => 'sigla', 'label' => 'Sigla'],
            ['key' => 'estado_nome', 'label' => 'Estado'],
            ['key' => 'actions', 'label' => ''],
        ];

        return view('livewire.pages.branch.includes.branch-data-form', compact('branches', 'headers'));
    }
}
