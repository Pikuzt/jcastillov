<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WebService;
use App\Models\empleados;
use App\Http\Requests\StoreempleadosRequest;
use App\Http\Requests\UpdateempleadosRequest;
use Symfony\Component\HttpFoundation\Request;

class EmpleadosController extends Controller
{

    public function index()
    {

        $data = empleados::all();
        return view('empleados.index', ['dataEmpleados' => $data ?? []]);
    }

    public function indexCliente()
    {

        $data = empleados::all();
        return view('empledosClientes.index', ['dataEmpleados' => $data ?? []]);
    }

    public function detalle($id)
    {

        // dd($id);
        $data = empleados::where('id', $id)->get();

        //   dd($data);
        $objeto = new WebService;
        $valorDolar = $objeto->mostrarApi();


        $fechaRegistro = strtotime($data[0]->created_at);
        $sueldo = $data[0]->sueldo_base;
        $incremento = ($sueldo * 4 / 100);
        $nuevoSalario = 0;
        $acomulador = 0;
        $acomulador1 = 0;
        $dataGrafica = [];
        for ($i = 1; $i < 5; ++$i) {
            $acomulador = $acomulador + 4;
            array_push($dataGrafica, array(
                'fechaRegistro' => date($data[0]->created_at),
                'fechaIncremento' => date("Y-m-d", strtotime('+' . $acomulador . 'month', $fechaRegistro)),
                'dolar' => $valorDolar->bmx->series[0]->datos[0]->dato,
                'sueldo' => $sueldo,
                'incremento' =>  $incremento,
                'nuevoSalario' => ($incremento * $i) + $sueldo,
                'nuevoSalarioDolares' => (($incremento * $i) + $sueldo) * $valorDolar->bmx->series[0]->datos[0]->dato
            ));
        }

        //  dd( $dataGrafica);

        return view('detalleEmpleado.index', [
            'dataEmpleado' => $data ?? [],
            'valoresGrafica' => $dataGrafica ?? []
        ]);
    }


    public function detalleSinGrafica($id)
    {
        $data = empleados::where('id', $id)->get();
        return view('detalleEmpleadoSinGrafica.index', [
            'dataEmpleado' => $data ?? []
        ]);
    }



    public function incrementoSalario()
    {

        $salario = new WebService;
        $data = $salario->mostrarApi();
        // dd($data);
    }


    public function create(Request $request)
    {
        // dd($request->all());
        $empleado = new empleados();
        $empleado->clave_empleado = $request->clave;
        $empleado->nombre = $request->nombre;
        $empleado->apellidos = $request->apellido_paterno . ' ' . $request->apellido_materno;
        $empleado->genero = $request->sexo;
        $empleado->edad = $request->edad;
        $empleado->fecha_nacimiento = $request->nacimiento;
        $empleado->sueldo_base = $request->sueldo;
        $empleado->status = $request->status;
        $empleado->save();


        if ($empleado) {
            return back()->with('success', 'empleado creado con exito.');
        }
        return back()->withErrors('error', 'error al guardar empleado .');
    }


    public function update(Request $request)
    {
        // dd($request->all());
        $empleado = empleados::find($request->id);
        $empleado->clave_empleado = $request->clave_editar;
        $empleado->nombre = $request->nombre_editar;
        $empleado->apellidos = $request->apellidos_editar;
        $empleado->genero = $request->sexo_editar;
        $empleado->edad = $request->edad_editar;
        $empleado->fecha_nacimiento = $request->nacimiento_editar;
        $empleado->sueldo_base = $request->sueldo_editar;
        $empleado->status = $request->status_editar;
        $empleado->save();


        if ($empleado) {
            return back()->with('success', 'empleado editado con exito.');
        }
        return back()->withErrors('error', 'error al editar al empleado .');
    }

    public function eliminar($id)
    {

        // dd($id);
        $empleado = empleados::find($id);
        $empleado->delete();


        if ($empleado) {
            return back()->with('success', 'empleado eliminado con exito.');
        }
        return back()->withErrors('error', 'error al eliminar al empleado .');
    }
}
