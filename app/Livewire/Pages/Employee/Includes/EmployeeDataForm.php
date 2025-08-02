<?php

namespace App\Livewire\Pages\Employee\Includes;

use App\Models\UserModel;
use Livewire\Attributes\On;
use Livewire\Component;

class EmployeeDataForm extends Component
{
    #[On('employee-created')]
    public function loadEmployee()
    {
        UserModel::where('active', 1)->get();
    }

    public function render()
    {
        $employee = UserModel::where('active', 1)
            ->orderBy('nome')
            ->get();

        $headers = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'nome', 'label' => 'Nome'],
            ['key' => 'setor_nome', 'label' => 'Setor'],
            ['key' => 'filial_nome', 'label' => 'Filial'],
            ['key' => 'actions', 'label' => ''],
        ];

        return view('livewire.pages.employee.includes.employee-data-form', compact('employee', 'headers'));
    }
}
