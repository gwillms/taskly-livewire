<?php

namespace App\Livewire\Pages\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Mary\Traits\Toast;

class UserPage extends Component
{
    use Toast;
    public UserForm $form;
    public bool $userModal = false;
    public ?int $editingUserId = null;

    public function save()
    {
        $this->form->validate();

        if ($this->editingUserId) {
            $user = User::find($this->editingUserId);
            $user->update([
                'name' => $this->form->name,
                'email' => $this->form->email,
            ]);

            if ($this->form->password) {
                $user->update(['password' => Hash::make($this->form->password)]);
            }

            $this->success('Usuário atualizado com sucesso');

        } else {
            User::create([
                'name' => $this->form->name,
                'email' => $this->form->email,
                'password' => Hash::make($this->form->password),
                'active' => true,
            ]);

            $this->success('Usuário criado com sucesso');
        }

        $this->closeModal();
    }

    #[On('edit-user')]
    public function editUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $this->editingUserId = $userId;
            $this->form->name = $user->name;
            $this->form->email = $user->email;
            $this->form->password = '';
            $this->form->password_confirmation = '';
            $this->userModal = true;
        }
    }

    public function openCreateModal()
    {
        $this->editingUserId = null;
        $this->form->reset();
        $this->userModal = true;
    }

    public function closeModal()
    {
        $this->userModal = false;
        $this->editingUserId = null;
        $this->form->reset();
    }

    #[Title('Usuário')]
    public function render()
    {
        return view('livewire.pages.user.user-page');
    }
}
