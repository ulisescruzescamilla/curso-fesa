<div>
    <x-slot name="header">
        <a href="{{route('categories.create')}}">
            <button class="btn btn-primary">Crear categoría</button>
        </a>
    </x-slot>

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
                        {{-- TODO add redirection, to edit specific category --}}
                        {{-- /category/ID/edit --}}
                        <a href="{{
                            route( 'categories.edit', ['category' => $categoria->id] )
                        }}">
                            <i class="cursor-pointer fa-regular fa-pen-to-square"></i>
                        </a>
                        {{-- Delete --}}
                        <i class="cursor-pointer fa-regular fa-trash-can"></i>
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
