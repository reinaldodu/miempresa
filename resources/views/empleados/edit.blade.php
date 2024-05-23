<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Empleado') }}
        </h2>
    </x-slot>
    {{-- Formulario --}}
    <div class="flex justify-center my-6">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                {{-- Formulario para crear un empleado --}}
                <form action="{{route('empleados.update', $empleado->id )}}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Nombre --}}
                    <div class="form-control">
                        <label class="label" for="nombres">
                            <span class="label-text">Nombres</span>
                        </label>
                        <input type="text" name="nombres" placeholder="Nombre del empleado" value="{{ $empleado->nombres }}"  class="input input-bordered" required />
                    </div>
                    {{-- Apellidos --}}
                    <div class="form-control">
                        <label class="label" for="apellidos">
                            <span class="label-text">Apellidos</span>
                        </label>
                        <input type="text" name="apellidos" placeholder="Escriba el apellido" value="{{ $empleado->apellidos }}" class="input input-bordered" />
                    </div>
                    {{-- Documento --}}
                    <div class="form-control">
                        <label class="label" for="documento">
                            <span class="label-text">Documento</span>
                        </label>
                        <input type="text" name="documento" placeholder="Escriba el documento" value="{{ $empleado->documento }}" class="input input-bordered" />
                    </div>                   
                    {{-- Teléfono --}}
                    <div class="form-control">
                        <label class="label" for="telefono">
                            <span class="label-text">Teléfono</span>
                        </label>
                        <input type="text" name="telefono" placeholder="Escriba el teléfono" value="{{ $empleado->telefono }}" class="input input-bordered" />
                    </div>
                    {{-- Dirección --}}
                    <div class="form-control">
                        <label class="label" for="direccion">
                            <span class="label-text">Dirección</span>
                        </label>
                        <input type="text" name="direccion" placeholder="Escriba la dirección" value="{{ $empleado->direccion }}" class="input input-bordered" />
                    </div>
                    {{-- Departamentos --}}
                    <label class="label" for="departamento_id">
                        <span class="label-text">Departamento</span>
                    </label>
                    <select name="departamento_id" class="form-select" required>
                        <option value="">Seleccione un departamento</option>
                        @foreach ($departamentos as $departamento)
                            @if ($departamento->id == $empleado->departamento_id)
                                <option value="{{ $departamento->id }}" selected>{{ $departamento->nombre }}</option>
                            @else
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endif
                        @endforeach
                    </select>

                    {{-- boton de enviar --}}
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
                        <a href="{{ route('empleados.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>