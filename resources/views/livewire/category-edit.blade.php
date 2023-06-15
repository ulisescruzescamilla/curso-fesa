<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <x-form-section submit="editCategory">
        <x-slot name="title">
            {{ $category->name }}
        </x-slot>

        <x-slot name="description">
            {{"Por favor llene los datos"}}
        </x-slot>

        <x-slot name="form">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" value="{{ __('Nombre de la categoría') }}" />
                <x-input id="name" type="text" class="block w-full mt-1" wire:model="name" autocomplete="name" />
                <x-input-error for="name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Guardado.') }}
            </x-action-message>

            <x-button wire:loading.attr="disabled" wire:target="category">
                {{ __('Actualizar') }}
            </x-button>
        </x-slot>
    </x-form-section>
    </div>
</div>
