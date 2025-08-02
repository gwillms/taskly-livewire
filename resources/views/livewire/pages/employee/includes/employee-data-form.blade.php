<div>
    <div class="border border-gray-300 rounded">
        @if (count($employee))
        <x-table :headers="$headers" :rows="$employee" striped>
            @scope('cell_actions', $employees)
            <div class="flex gap-2">
                <x-button icon="o-pencil" wire:click="edit({{ $employees->id }})"
                    class="btn-sm btn-ghost text-gray-600 hover:text-gray-800" tooltip="Editar" />
                <x-button icon="o-trash" wire:click="confirmDelete({{ $employees->id }})"
                    class="btn-sm btn-ghost text-red-600 hover:text-red-800" tooltip="Excluir" />
            </div>
            @endscope
        </x-table>
        @else
        <div class="p-4 text-sm text-gray-500 dark:text-gray-300">
            Não há dados para exibir
        </div>
        @endif
    </div>

    <x-modal wire:model="showDeleteModal" title="Confirmar Exclusão">
        <div class="py-4">
            <p class="text-gray-700 dark:text-gray-300">
                Tem certeza que deseja excluir este colaborador? Esta ação não pode ser desfeita.
            </p>
        </div>

        <x-slot:actions>
            <x-button label="Cancelar" wire:click="cancelDelete" class="btn-outline" />
            <x-button label="Excluir" wire:click="delete" class="btn-error" spinner="delete" />
        </x-slot:actions>
    </x-modal>
</div>
