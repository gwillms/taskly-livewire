<div>
    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-xl font-bold leading-tight text-gray-700 dark:text-white">
            Filial
        </h1>
        <x-button class="btn-primary" label="Nova Filial" wire:click="$toggle('branchModal')" />
    </div>
    <x-drawer wire:model="branchModal" class="w-10/12 lg:w-1/2" right>
        <x-button icon="o-chevron-left" @click="$wire.branchModal = false" />
        <x-form wire:submit="save">
            <div class="grid grid-cols-4 gap-2 p-4">
                <div class="col-span-4">
                    <x-input label="Filial" wire:model="form.filial" placeholder="Filial" clearable />
                </div>
                <div class="col-span-4">
                    <x-input label="Sigla" wire:model="form.sigla" placeholder="Sigla" clearable />
                </div>
                <div class="col-span-4">
                    <x-select label="Estado" wire:model="form.estado" :options="$estadoList"
                        placeholder="Selecione um estado" />
                </div>
            </div>
            <x-slot:actions>
                <x-button label="Salvar" type="submit" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-drawer>

    <livewire:pages.branch.includes.branch-data-form />
</div>