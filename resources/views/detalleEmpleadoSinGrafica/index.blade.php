@extends('layouts.app')

@section('content')
    {{-- @php
        echo '<pre>';
        print_r($dataEmpleado);
        echo '</pre>';
    @endphp --}}



    <section class="container">
        <div class="row">
            <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">

                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{$dataEmpleado[0]->nombre}} {{$dataEmpleado[0]->apellidos}}</h5>
                          <div class="card-text"><strong>Edad:</strong> {{$dataEmpleado[0]->edad}}</div>
                          <div class="card-text"><strong>Genero:</strong> {{$dataEmpleado[0]->genero}}</div>
                          <div class="card-text"><strong>Fecha Nacimiento:</strong> {{$dataEmpleado[0]->fecha_nacimiento}}</div>

                        </div>
                      </div>
                    </div>
                  </div>
            </div>


        </div>
    </section>







@endsection
