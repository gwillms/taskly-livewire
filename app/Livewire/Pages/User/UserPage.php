<?php

namespace App\Livewire\Pages\User;

use App\Livewire\Forms\UserForm;
use App\Models\Branch;
use App\Models\Section;
use Livewire\Component;
use App\Models\UserModel;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

class UserPage extends Component
{
    use Toast;
    public UserForm $form;
    public bool $userModal = false;
    public $branchList = [];
    public $sectionList = [];

    public function mount() {
        $this->branchList = Branch::where('active', 1)
        ->get(['id', 'filial'])
        ->map(fn($item) => ['id' => $item->id, 'name' => $item->filial])
        ->values();

    $this->sectionList = Section::where('active', 1)
        ->get(['id', 'setor'])
        ->map(fn($item) => ['id' => $item->id, 'name' => $item->setor])
        ->values();
    }

    public function save() {
        $this->form->validate();

        UserModel::create([
            'nome' => $this->form->nome,
            'filial_id' => $this->form->filial_id,
            'setor_id' => $this->form->setor_id,
        ]);

        $this->success('Usuário criado com sucesso');

        $this->dispatch('user-created');
        $this->userModal = false;
        $this->form->reset();
    }

    #[Title('Usuário')]
    public function render()
    {
        return view('livewire.pages.user.user-page');
    }
}
