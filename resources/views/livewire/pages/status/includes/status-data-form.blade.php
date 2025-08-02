<div class="border border-gray-300 rounded">
    @if (count($status))
    <x-table :headers="$headers" :rows="$status" striped />
    @else
    <div class="p-4 text-sm text-gray-500 dark:text-gray-300">
        Não há dados para exibir
    </div>
    @endif
</div>