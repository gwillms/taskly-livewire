<div>
    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-xl font-bold leading-tight text-gray-700 dark:text-white">
            Chamados
        </h1>
        <x-button class="btn-primary" label="Novo Chamado" wire:click="$toggle('taskModal')" />
    </div>
    <x-drawer wire:model="taskModal" class="w-10/12 lg:w-1/2" right>
        <x-button icon="o-chevron-left" @click="$wire.taskModal = false" />
        <x-form wire:submit="save">
            <div class="grid grid-cols-4 gap-2 p-4">
                <div class="col-span-4">
                    <x-select label="Status" wire:model="form.status_id" :options="$statusList"
                        placeholder="Selecione o status" />
                </div>
                <div class="col-span-4">
                    <x-select label="Colaborador" wire:model="form.employee_id" :options="$employeeList"
                        placeholder="Selecione o colaborador" />
                </div>
                <div class="col-span-4">
                    <x-select label="Filial" wire:model="form.filial_id" :options="$filialList"
                        placeholder="Selecione a filial" />
                </div>
                <div class="col-span-4">
                    <x-select label="Setor" wire:model="form.setor_id" :options="$setorList"
                        placeholder="Selecione o setor" />
                </div>
                <div class="col-span-4">
                    <x-textarea class="resize-none" label="Chamado" wire:model="form.chamado"
                        placeholder="Descreva o chamado..." rows="5" />
                </div>
                <div class="col-span-4">
                    <x-image-library wire:model="files" wire:library="anexo" :preview="$anexo" label="Anexos de Imagem"
                        hint="Max 1MB cada" change-text="Alterar" crop-text="Recortar" remove-text="Remover"
                        crop-title-text="Recortar imagem" crop-cancel-text="Cancelar" crop-save-text="Salvar"
                        add-files-text="Adicionar imagens" />
                </div>
            </div>
            <x-slot:actions>
                <x-button label="Salvar" type="submit" class="btn-primary" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-drawer>

    <livewire:pages.task.includes.task-data-form />
</div>
