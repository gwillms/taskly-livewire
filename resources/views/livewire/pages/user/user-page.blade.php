<div>
    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-xl font-bold leading-tight text-gray-700 dark:text-white">
            Usuários
        </h1>
        <x-button class="btn-primary" label="Novo Usuário" wire:click="$toggle('userModal')" />
    </div>

    <x-drawer wire:model="userModal" class="w-10/12 lg:w-1/2" right>
        <x-button icon="o-chevron-left" @click="$wire.userModal = false" />

        <x-form wire:submit="save">
            <div class="grid grid-cols-4 gap-4 p-4">
                <div class="col-span-4">
                    <x-input label="Nome" wire:model="form.name" placeholder="Digite o nome completo" clearable
                        required />
                </div>

                <div class="col-span-4">
                    <x-input type="email" label="Email" wire:model="form.email" placeholder="Digite o email" clearable
                        required />
                </div>

                <div class="col-span-4">
                    <x-input type="password" label="Senha" wire:model="form.password" placeholder="Digite a senha"
                        required />
                </div>

                <div class="col-span-4">
                    <x-input type="password" label="Confirmar Senha" wire:model="form.password_confirmation"
                        placeholder="Confirme a senha" required />
                </div>
            </div>

            <x-slot:actions>
                <x-button label="Cancelar" @click="$wire.userModal = false" class="btn-outline" />
                <x-button label="Salvar" type="submit" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-drawer>

    <livewire:pages.user.includes.user-data-form />
</div>