<?php

namespace App\Livewire\Pages\User\Includes;

use App\Models\UserModel;
use Livewire\Attributes\On;
use Livewire\Component;

class UserDataForm extends Component
{
    #[On('user-created')]
    public function loadUser()
    {
        UserModel::where('active', 1)->get();
    }

    public function render()
    {
    $user = UserModel::with(['filial', 'setor'])
        ->where('active', 1)
        ->get();

    $headers = [
        ['key' => 'nome', 'label' => 'Nome'],
        ['key' => 'filial', 'label' => 'Filial'],
        ['key' => 'setor', 'label' => 'Setor'],
        ['key' => 'id', 'label' => 'ID'],
        ['key' => 'actions', 'label' => ''],
    ];

    $rows = $user->map(function ($u) {
        return [
            'nome'   => $u->nome,
            'filial' => $u->filial?->filial ?? '-',
            'setor'  => $u->setor?->setor ?? '-',
            'id'     => $u->id,
        ];
    });

    return view('livewire.pages.user.includes.user-data-form', compact('headers', 'rows'));
}

}
