<?php

namespace App\Livewire\Pages\Branch\Includes;

use App\Models\Branch;
use Livewire\Attributes\On;
use Livewire\Component;

class BranchDataForm extends Component
{
    #[On('branch-created')]
    public function loadBranches()
    {
        Branch::where('active', 1)->get();
    }
    public function render()
    {
        $branches = Branch::where('active', 1)->get();

        $headers = [
            ['key' => 'filial', 'label' => 'Filial'],
            ['key' => 'sigla', 'label' => 'Sigla'],
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'actions', 'label' => ''],
        ];

        return view('livewire.pages.branch.includes.branch-data-form', compact('branches', 'headers'));
    }
}
