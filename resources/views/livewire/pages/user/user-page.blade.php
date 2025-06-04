<div>
    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-xl font-bold leading-tight text-gray-700 dark:text-white">
            Usuário
        </h1>
        <x-button class="btn-primary" label="Novo Usuário" wire:click="$toggle('userModal')" />
    </div>
    <x-drawer wire:model="userModal" class="w-10/12 lg:w-1/2" right>
        <x-button icon="o-chevron-left" @click="$wire.userModal = false" />
        <x-form wire:submit="save">
            <div class="grid grid-cols-4 gap-2 p-4">
                <div class="col-span-4">
                    <x-input label="Nome" wire:model="form.nome" placeholder="Nome" clearable />
                </div>
                <div class="col-span-4">
                    <x-select placeholder="Selecione uma filial" label="Filial" wire:model="form.filial_id"
                        :options="$branchList" icon-right="o-building-office" />
                </div>
                <div class="col-span-4">
                    <x-select placeholder="Selecione um setor" label="Setor" wire:model="form.setor_id"
                        :options="$sectionList" icon-right="o-home" />
                </div>
            </div>
            <x-slot:actions>
                <x-button label="Salvar" type="submit" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-drawer>

    <livewire:pages.user.includes.user-data-form>
</div>
