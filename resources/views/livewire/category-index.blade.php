<div>
    <x-slot name="header">
        <a href="{{route('categories.create')}}">
            <button class="btn btn-primary">Crear categoría</button>
        </a>
    </x-slot>

    <x-confirmation-modal wire:model="deleteToggle">
        <x-slot name="title">
            {{ __('Borrar categoría') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Estás seguro de eliminar esta categoría?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('deleteToggle')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Borrar') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            {{-- The best athlete wants his opponent at his best. --}}
            <div class="overflow-x-auto">
                <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Fecha de creación</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                    <tr class="bg-base-200">
                    <th>{{$categoria->id}}</th>
                    <td>{{$categoria->name}}</td>
                    <td>{{$categoria->created_at}}</td>
                    <td>
                        {{-- Edit btn --}}
                        <a href="{{
                            route( 'categories.edit', ['category' => $categoria->id] )
                        }}">
                            <i class="cursor-pointer fa-regular fa-pen-to-square"></i>
                        </a>
                        {{-- Delete --}}
                        <button wire:click="deleteConfirmation({{$categoria->id}})">
                            <i class="cursor-pointer fa-regular fa-trash-can"></i>
                        </button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div>
                {{$categorias->links()}}
            </div>
        </div>
        </div>
    </div>
</div>
