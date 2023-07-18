@extends('layouts.app')

@section('content')
    <div class="container">


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            {{ __('New employee') }}
        </button>



        @if ($message = Session::get('success'))
            <div class=" col alert alert-success alert-dismissible fade show mb-2" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class=" col alert alert-success alert-dismissible fade show mb-2" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center p-2">



            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Surnames') }}</th>
                            <th scope="col">{{ __('Age') }}</th>
                            <th scope="col">{{ __('Birth date') }}</th>
                            <th scope="col">{{ __('Gender') }}</th>
                            <th scope="col">{{ __('Salary') }}</th>
                            <th scope="col">{{ __('Detail') }}</th>
                            <th scope="col">{{ __('Edit') }}</th>
                            <th scope="col">{{ __('Eliminate') }}</th>
                        </tr>
                    </thead>
                    <tbody>




                        @forelse ($dataEmpleados as $key => $item)
                            <tr>
                                <td>{{ $item->clave_empleado }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->apellidos }}</td>
                                <td>{{ $item->genero }}</td>
                                <td>{{ $item->edad }}</td>
                                <td>{{ $item->fecha_nacimiento }}</td>
                                <td> $ {{ $item->sueldo_base }}</td>
                                <td><a href="{{ route('detalle.empleado', ['empleados' => $item->id]) }}"
                                    type="button" class="btn btn-danger me-md-2">{{ __('Detail') }}</a> </td>

                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editar" data-bs-id="{{ $item->id }}"
                                        data-bs-clave="{{ $item->clave_empleado }}" data-bs-nombre="{{ $item->nombre }}"
                                        data-bs-apellidos="{{ $item->apellidos }}" data-bs-genero="{{ $item->genero }}"
                                        data-bs-edad="{{ $item->edad }}"
                                        data-bs-fecha_nacimiento="{{ $item->fecha_nacimiento }}"
                                        data-bs-status="{{ $item->status }}"
                                        data-bs-sueldo_base="{{ $item->sueldo_base }}">{{ __('Edit') }}</button>
                                </td>
                                <td><a href="{{ route('eliminar.empleados', ['empleados' => $item->id]) }}"
                                    type="button" class="btn btn-danger me-md-2">{{ __('Eliminate') }}</a> </td>
                            </tr>
                        @empty

                            <strong> Sin datos </strong>
                        @endforelse




                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('modal')
    @include('empleados.modal.crear_empleado')
    @include('empleados.modal.editar_empleado')
@endsection
