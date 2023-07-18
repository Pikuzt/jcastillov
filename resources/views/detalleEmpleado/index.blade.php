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
                                <h5 class="card-title">{{ $dataEmpleado[0]->nombre }} {{ $dataEmpleado[0]->apellidos }}</h5>
                                <div class="card-text"><strong>{{ __('Age') }}:</strong> {{ $dataEmpleado[0]->edad }}
                                </div>
                                <div class="card-text"><strong>{{ __('Gender') }} :</strong> {{ $dataEmpleado[0]->genero }}
                                </div>
                                <div class="card-text">
                                    <strong>{{ __('Birth date') }}:</strong>{{ $dataEmpleado[0]->fecha_nacimiento }}</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="chartBox" style="height: 400px; ">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>
    </section>






    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
        // setup

        const dataGrafica = {!! json_encode($valoresGrafica) !!}
        // console.log(dataGrafica);

        const data = {
            labels: [dataGrafica[0].fechaIncremento, dataGrafica[1].fechaIncremento, dataGrafica[2].fechaIncremento,
                dataGrafica[3].fechaIncremento
            ],
            type: 'bar',
            datasets: [{
                    label: 'Salario Incrementado %4',
                    data: [dataGrafica[0].nuevoSalario, dataGrafica[1].nuevoSalario, dataGrafica[2].nuevoSalario,
                        dataGrafica[3].nuevoSalario
                    ],
                    backgroundColor: [
                        'rgba(255, 26, 104, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 26, 104, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 1
                },


                {
                    label: 'Salario Incrementado %4 en dolares',
                    type: 'bar',
                    data: [dataGrafica[0].nuevoSalarioDolares, dataGrafica[1].nuevoSalarioDolares, dataGrafica[2]
                        .nuevoSalarioDolares, dataGrafica[3].nuevoSalarioDolares
                    ],
                    backgroundColor: [
                        'rgba(255, 26, 104, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 26, 104, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 1
                },
            ]
        };

        // config
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // render init block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        // Instantly assign Chart.js version
        const chartVersion = document.getElementById('chartVersion');
        chartVersion.innerText = Chart.version;
    </script>
@endsection
