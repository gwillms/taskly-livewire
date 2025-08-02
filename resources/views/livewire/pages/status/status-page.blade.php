<div>
    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-xl font-bold leading-tight text-gray-700 dark:text-white">
            Status
        </h1>
        <x-button class="btn-primary" label="Novo Status" wire:click="$toggle('statusModal')" />
    </div>
    <x-drawer wire:model="statusModal" class="w-10/12 lg:w-1/2" right>
        <x-button icon="o-chevron-left" @click="$wire.statusModal = false" />
        <x-form wire:submit="save">
            <div class="grid grid-cols-4 gap-2 p-4">
                <div class="col-span-4">
                    <x-input label="Status" wire:model="form.status" placeholder="Status" clearable />
                </div>
            </div>
            <x-slot:actions>
                <x-button label="Salvar" type="submit" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-drawer>

    <livewire:pages.status.includes.status-data-form />
</div>