<?php

namespace App\Livewire\Pages\User\Includes;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class UserDataForm extends Component
{
    use Toast;
    public $selectedUserId;
    public $showDeleteModal = false;

    #[On('user-created')]
    public function loadUsers()
    {
        User::where('active', 1)->get();
    }
    public function edit($userId)
    {
        $this->dispatch('edit-user', userId: $userId);
    }

    public function confirmDelete($userId)
    {
        $this->selectedUserId = $userId;
        $this->showDeleteModal = true;
    }
    public function delete()
    {
        if ($this->selectedUserId) {
            $user = User::find($this->selectedUserId);

            if ($user) {
                $user->delete();

                $this->success('Usuário excluído com sucesso');
            }
        }

        $this->showDeleteModal = false;
        $this->selectedUserId = null;
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->selectedUserId = null;
    }
    public function render()
    {
        $users = User::where('active', 1)
            ->orderBy('name')
            ->get()
            ->map(function ($user) {
                $user->created_at_formatted = $user->created_at->format('d/m/Y');
                return $user;
            });

        $headers = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'name', 'label' => 'Nome'],
            ['key' => 'email', 'label' => 'Email'],
            ['key' => 'created_at_formatted', 'label' => 'Criado em:'],
            ['key' => 'actions', 'label' => ''],
        ];

        return view('livewire.pages.user.includes.user-data-form', compact('users', 'headers'));
    }
}
