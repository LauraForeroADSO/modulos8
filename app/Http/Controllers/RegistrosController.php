<?php

namespace App\Http\Controllers;

use App\Models\Registros;
use Illuminate\Http\Request;
//use Illuminate\View\View;
//use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class RegistrosController extends Controller
{

    public function index()
    {
        $registros = Registros::all();
        return view('layouts.app', compact('registros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('imagen')) {
            // Almacenar la imagen en la carpeta de almacenamiento público
            if ($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $nombreArchivo = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $nombreArchivo);
            }

            // Guardar el path de la imagen en la base de datos
            $registro = new Registros();
            $registro->imagen = $nombreArchivo;
            // Asigna los demás campos
            $registro->nombre = $request->nombre;
            $registro->cedula = $request->cedula;
            $registro->edad = $request->edad;
            $registro->sexo = $request->sexo;
            $registro->telefono = $request->telefono;
            $registro->save();
        }
        return redirect()->back()->with('success', 'Visitante registrado exitosamente.');
    }


    public function show($registro)
    {
        $registro = Registros::findOrFail($registro);
        return view('registros.show', compact('registro'));
    }


    public function edit($idRegistro)
    {
        $registro = Registros::findOrFail($idRegistro);
        return view('registros.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idRegistro)
    {
        $datoRegistro = Registros::findOrFail($idRegistro);

        // Verificar si se adjuntó un nuevo archivo de imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior del servidor si existe
            if ($datoRegistro->imagen) {
                // Eliminar la imagen anterior del servidor
                if (file_exists(public_path('images/' . $datoRegistro->imagen))) {
                    unlink(public_path('images/' . $datoRegistro->imagen));
                }
            }

            // Almacenar la nueva imagen en la carpeta de almacenamiento público
            $file = $request->file('imagen');
            $nombreArchivo = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $nombreArchivo);

            // Actualizar el nombre de la imagen en la base de datos
            $datoRegistro->imagen = $nombreArchivo;
        }

        // Actualizar los demás campos del visitante
        $datoRegistro->nombre = $request->nombre;
        $datoRegistro->cedula = $request->cedula;
        $datoRegistro->edad = $request->edad;
        $datoRegistro->sexo = $request->sexo;
        $datoRegistro->telefono = $request->telefono;
        $datoRegistro->save();

        return redirect()->route('home')->with('success', 'Visitante actualizado exitosamente.');
    }


    public function destroy($idRegistro)
    {
        $registro = Registros::find($idRegistro);

        if (!$registro) {
            return redirect()->route('home')->with('error', 'Visitante no encontrado.');
        }

        // Elimina el visitante
        $registro->delete();

        // Elimina el archivo de imagen si existe
        if ($registro->imagen) {
            $path = public_path('images/' . $registro->imagen);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return redirect()->route('home')->with('success', 'Visitante eliminado exitosamente.');
    }
}
