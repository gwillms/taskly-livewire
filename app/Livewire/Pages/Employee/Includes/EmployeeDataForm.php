<?php

namespace App\Livewire\Pages\Employee\Includes;

use App\Models\UserModel;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class EmployeeDataForm extends Component
{
    use Toast;
    public $selectedEmployeeId;
    public $showDeleteModal = false;

    #[On('employee-created')]
    public function loadEmployee()
    {
        UserModel::where('active', 1)->get();
    }
    public function edit($employeeId)
    {
        $this->dispatch('edit-employee', employeeId: $employeeId);
    }
    public function confirmDelete($employeeId)
    {
        $this->selectedEmployeeId = $employeeId;
        $this->showDeleteModal = true;
    }
    public function delete()
    {
        if ($this->selectedEmployeeId) {
            $employee = UserModel::find($this->selectedEmployeeId);

            if ($employee) {
                $employee->delete();

                $this->success('Setor excluído com sucesso');
            }
        }

        $this->showDeleteModal = false;
        $this->selectedEmployeeId = null;
    }
    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->selectedEmployeeId = null;
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
