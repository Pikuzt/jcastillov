<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row g-3">


                    <div class="col-md-4">

                        <input type="text" name="id" hidden class="form-control id" id="inputEmail4"
                            form="formEdit">

                        <label for="inputEmail4" class="form-label">Clave Empleado</label>
                        <input type="text" readonly name="clave_editar" class="form-control clave" id="inputEmail4"
                            form="formEdit">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">{{ __('Name') }}</label>
                        <input type="text" name="nombre_editar" class="form-control nombre" id="inputPassword4"
                            form="formEdit">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">{{ __('Last name') }}</label>
                        <input type="text" name="apellidos_editar" class="form-control apellidos" id="inputAddress"
                            form="formEdit" placeholder="1234 Main St">
                    </div>

                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">{{ __('Age') }}</label>
                        <input type="number" name="edad_editar" class="form-control edad" id="inputCity"
                            form="formEdit">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">{{ __('Birth date') }}</label>
                        <input type="date" name="nacimiento_editar" class="form-control nacimiento" id="inputCity"
                            form="formEdit">
                    </div>

                    <div class="col-6">
                        <label for="inputAddress2" class="form-label">{{ __('Gender') }}</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input sexoF" type="radio" name="sexo_editar" id="sexo1"
                                form="formEdit" value="F">
                            <label class="form-check-label" for="sexo1">F</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input sexoM" type="radio" name="sexo_editar"
                                id="sexo2" form="formEdit" value="M">
                            <label class="form-check-label" for="sexo2">M</label>
                        </div>

                    </div>

                    <div class="col-6">
                        <label for="inputAddress2" class="form-label">{{ __('status') }}</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input status1" type="radio" name="status_editar" id="status1"
                                form="formEdit" value="1">
                            <label class="form-check-label" for="status1">activo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input status2" type="radio" name="status_editar" id="status2"
                                form="formEdit" value="0">
                            <label class="form-check-label" for="status2">inactivo</label>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <input type="number" name="sueldo_editar" class="form-control sueldo" id="inputCity"
                            placeholder="Sueldo base" form="formEdit">
                    </div>





                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('update.empleados') }}" class="my-4" method="POST"
                enctype="multipart/form-data" id="formEdit">
                @csrf
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary">Editar</button>

            </form> </div>
        </div>
    </div>
</div>



<script>
    var exampleModal = document.getElementById('editar')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var clave = button.getAttribute('data-bs-clave')
        var nombre = button.getAttribute('data-bs-nombre')
        var apellidos = button.getAttribute('data-bs-apellidos')
        var genero = button.getAttribute('data-bs-genero')
        var edad = button.getAttribute('data-bs-edad')
        var nacimiento = button.getAttribute('data-bs-fecha_nacimiento')
        var sueldo = button.getAttribute('data-bs-sueldo_base')



        var id_input = exampleModal.querySelector('.id')
        var clave_input = exampleModal.querySelector('.clave')
        var nombre_input = exampleModal.querySelector('.nombre')
        var apellidos_input = exampleModal.querySelector('.apellidos')
        var edad_input = exampleModal.querySelector('.edad')
        //   var genero_input = exampleModal.querySelector('.modal-title')
        var nacimiento_input = exampleModal.querySelector('.nacimiento')
        var sueldo_input = exampleModal.querySelector('.sueldo')
        var status_input = exampleModal.querySelector('.data-bs-status')

        id_input.value = id
        clave_input.value = clave
        nombre_input.value = nombre
        apellidos_input.value = apellidos
        apellidos_input.value = apellidos
        edad_input.value = edad
        nacimiento_input.value = nacimiento
        sueldo_input.value = sueldo


        if (genero === 'M') {
            document.querySelector('.sexoM').checked = true;
        } else {
            document.querySelector('.sexoF').checked = true;
        }


        if (status_input == 1) {
            document.querySelector('.status1').checked = true;
        } else {
            document.querySelector('.status2').checked = true;
        }


    })
</script>
