<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alta empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Clave Empleado</label>
                        <input type="text" name="clave" readonly class="form-control" id="clave" form="guardar">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" form="guardar" required>
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Apellido paterno</label>
                        <input type="text" name="apellido_paterno" class="form-control" id="apellido_paterno" form="guardar" required
                            >
                    </div>

                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Apellido materno</label>
                        <input type="text" name="apellido_materno" class="form-control" id="apellido_materno" form="guardar" required
                            >
                    </div>

                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Edad</label>
                        <input type="number" name="edad" class="form-control" id="inputCity" form="guardar" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Fecha Nacimiento</label>
                        <input type="date" name="nacimiento" class="form-control" id="inputCity" form="guardar" required>
                    </div>

                    <div class="col-6">
                        <label for="inputAddress2" class="form-label">Sexo</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" required
                                form="guardar" value="F">
                            <label class="form-check-label" for="inlineRadio1">F</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" required
                                form="guardar" value="M">
                            <label class="form-check-label" for="inlineRadio2">M</label>
                        </div>

                    </div>

                    <div class="col-6">
                        <label for="inputAddress2" class="form-label">status</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" required
                                form="guardar" value="1">
                            <label class="form-check-label" for="inlineRadio1">activo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" required
                                form="guardar" value="0">
                            <label class="form-check-label" for="inlineRadio2">inactivo</label>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <input type="number" name="sueldo" class="form-control" id="sueldo" required
                            placeholder="Sueldo base" form="guardar">
                    </div>

                    <div class="col-md-4">
                        <input type="number" disabled  name="conversion" class="form-control" id="conversion" placeholder="monto en dolares"
                           >
                    </div>

                    <div class="col-md-4">
                        <input type="number"  disabled name="valor_dolar" class="form-control" id="valor_dolar" placeholder="valor Dolar"
                           >
                    </div>





                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('guardar.empleados') }}" method="POST" enctype="multipart/form-data"
                    id="guardar">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    const button = document.getElementById("sueldo");
    button.addEventListener("change", function() {
        clave()
        conversionDolares()
    });
    function clave() {


        let today = new Date();
        let day = today.getDate();
        let month = today.getMonth() + 1;
        let year = today.getFullYear();
        let nombre = document.getElementById('nombre').value
        let apellidoP = document.getElementById('apellido_paterno').value
        let apellidoM = document.getElementById('apellido_materno').value
        let Resultado = `${year}${month}${day}`+nombre.charAt(0)+apellidoP+apellidoM.charAt(0)
        document.getElementById('clave').value = Resultado;
            // console.log(Resultado);
    }

    function conversionDolares(){
        fetch("{{ route('conversionDolares.API') }}")
            .then(response => response.json())
            .then(contenido)
            .catch(error => console.log('error', error));
    }
    function contenido(jsonResponse) {
        // console.log(jsonResponse)
        // console.log(jsonResponse.bmx.series[0].datos[0].dato)
        let valorDolar = jsonResponse.bmx.series[0].datos[0].dato
        const valorSaldo = document.getElementById('sueldo').value;
        // console.log(valorSaldo);
         document.getElementById('conversion').value = valorSaldo * valorDolar ;
         document.getElementById('valor_dolar').value = valorDolar ;
    //    let saldo = document.getElementById('saldo').value ;

    }
</script>
