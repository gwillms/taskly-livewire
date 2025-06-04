<div>
    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-xl font-bold leading-tight text-gray-700 dark:text-white">
            Setor
        </h1>
        <x-button class="btn-primary" label="Novo Setor" wire:click="$toggle('sectionModal')" />
    </div>
    <x-drawer wire:model="sectionModal" class="w-10/12 lg:w-1/2" right>
        <x-button icon="o-chevron-left" @click="$wire.sectionModal = false" />
        <x-form wire:submit="save">
            <div class="grid grid-cols-4 gap-2 p-4">
                <div class="col-span-4">
                    <x-input label="Setor" wire:model="form.setor" placeholder="Setor" clearable />
                </div>
            </div>
            <x-slot:actions>
                <x-button label="Salvar" type="submit" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-drawer>

    <livewire:pages.section.includes.section-data-form />
</div>