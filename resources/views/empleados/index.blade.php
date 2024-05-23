<x-app-layout>
    <x-slot name="header">
        <div class= "flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de empleados') }}
            </h2>
            {{-- Botón para crear un nuevo empleado --}}
            {{-- si no hay departamentos no se puede crear un empleado --}}
            @if ($departamentos->count())
                <a href="{{ route('empleados.create') }}" class="btn btn-outline">Crear empleado</a>
            @endif
        </div>
        
    </x-slot>
    <div class="flex">
        
        {{-- Filtro de búsqueda por empleado --}}
        <div>
            <form action="{{ route('empleados.index') }}" class="flex m-4 items-center method="GET">
                <div class="form-control">
                    <input type="text" name="buscar" placeholder="Buscar empleado"  class="input input-sm input-bordered" value="{{ request('buscar') }}" />
                </div>
                {{-- botón buscar --}}
                <button type="submit" class="btn btn-sm btn-outline btn-primary ml-2">Buscar</button>
                <a href="{{ route('empleados.index') }}" title="Limpiar" class="btn btn-sm btn-outline btn-primary ml-2">
                    Limpiar
                </a>
            </form>
        </div>
        {{-- Filtro de búsqueda por departamento, solo seleccionando el nombre --}}
        <div>
            <form action="{{ route('empleados.index') }}" class="flex m-4 items-center" method="GET">
                <div class="form-control">
                    <label class="label" for="departamento_id">
                        <span class="label-text">Filtrar por departamento</span>
                    </label>
                </div>
                <div class="form-control">
                    <select name="departamento_id" class="select select-bordered select-sm w-full max-w-xs" onchange="this.form.submit()">
                        <option value="">Seleccione un departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ request('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                {{ $departamento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
    
    




    {{-- Lista de empleados --}}
    <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th>Nombre empleado</th>
              <th>Departamento</th>
              <th>Dirección</th>
              <th>Email</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                <td>
                    <div class="flex items-center gap-3">
                    <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                        <img src="https://source.unsplash.com/random/50x50/?face&{{ $empleado->id }}" alt="{{ $empleado->nombres }}" />
                        </div>
                    </div>
                    <div>
                        <div class="font-bold">{{ $empleado->nombres . ' ' . $empleado->apellidos }}</div>
                    </div>
                    </div>
                </td>
                <td>
                    {{ $empleado->departamento->nombre }}
                </td>
                <td>
                    {{ $empleado->direccion }}
                </td>
                <td>{{ $empleado->user->email }}</td>
                <th>
                    {{-- Botón de editar y eliminar --}}
                    <div class="flex justify-end">
                        <a href="{{ route('empleados.edit', $empleado->id) }}" title="Editar {{ $empleado->nombres . ' ' . $empleado->apellidos }}" class="btn btn-ghost btn-xs btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-ghost btn-xs btn-error">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                            </button>
                        </form>
                </th>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{-- paginación --}}
        <div class="pagination">
          {{ $empleados->links() }}
      </div>
    
</x-app-layout>