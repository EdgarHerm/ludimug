<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Direccion;
use App\Models\Persona;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.profile');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validated = $request->validate([
            //direccion
            'eresidencia' => 'required',
            'mresidencia' => 'required',
            'localidad' => 'required',
            'calle' => 'required',
            'numero' => 'required',
            'calle1' => 'required',
            'calle2' => 'required',
            'colonia' => 'required',
            'cp' => 'required',

            //persona

            'nombres' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'fechanac' => 'required',
            'curp' => 'required',
            'sexo' => 'required',
            'nacionalidad' => 'required',
            'pnacionalidad' => 'required',
            'porigen' => 'required',
            'efednac' => 'required',
            'telefonoc' => 'required',
            'ocupacion' => 'required',
            'inseducativa' => 'required',

        ]);

        $date = new DateTime("now", new DateTimeZone('America/Mexico_City') );
        //Auth::user()->id
        DB::beginTransaction();
        $registerAddress = new Direccion();
        $registerAddress->efednac = $request->efednac;
        $registerAddress->eresidencia = $request->eresidencia;
        $registerAddress->mresidencia = $request->mresidencia;
        $registerAddress->localidad = $request->localidad;
        $registerAddress->calle = $request->calle;
        $registerAddress->numero = $request->numero;
        $registerAddress->calle1 = $request->calle1;
        $registerAddress->calle2 = $request->calle2;
        $registerAddress->colonia = $request->colonia;
        $registerAddress->cp = $request->cp;
        $registerAddress->save();

        $registerPerson = new Persona();
        $registerPerson->nombres = $request->nombres;
        $registerPerson->apellidop = $request->apellidop;
        $registerPerson->apellidom = $request->apellidom;
        $registerPerson->fechanac = $request->fechanac;
        $registerPerson->curp = $request->curp;
        $registerPerson->sexo = $request->sexo;
        $registerPerson->pindigena = $request->pindigena;
        $registerPerson->lindigena = $request->lindigena;
        $registerPerson->nacionalidad = $request->nacionalidad;
        $registerPerson->pnacionalidad = $request->pnacionalidad;
        $registerPerson->porigen = $request->porigen;
        if($request->nacionalidad=="Mexicana"){
            $registerPerson->emigrante = "No";
        }else{
            $registerPerson->emigrante = "Sí";
        }
        $registerPerson->telefonoc = $request->telefonoc;
        $registerPerson->ocupacion = $request->ocupacion;
        $registerPerson->inseducativa = $request->inseducativa;
        $registerPerson->idDireccion = $registerAddress->id;
        $registerPerson->idUsuario = Auth::user()->id;
        $registerPerson->save();

        DB::commit();
        return Redirect()->route('site.index');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            //direccion
            'eresidencia' => 'required',
            'mresidencia' => 'required',
            'localidad' => 'required',
            'calle' => 'required',
            'numero' => 'required',
            'calle1' => 'required',
            'calle2' => 'required',
            'colonia' => 'required',
            'cp' => 'required',

            //persona

            'nombres' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'fechanac' => 'required',
            'curp' => 'required',
            'sexo' => 'required',
            'nacionalidad' => 'required',
            'pnacionalidad' => 'required',
            'porigen' => 'required',
            'efednac' => 'required',
            'telefonoc' => 'required',
            'ocupacion' => 'required',
            'inseducativa' => 'required',

        ]);

        $date = new DateTime("now", new DateTimeZone('America/Mexico_City') );
        //Auth::user()->id
        DB::beginTransaction();
        $registerAddress = new Direccion();
        $registerAddress->efednac = $request->efednac;
        $registerAddress->eresidencia = $request->eresidencia;
        $registerAddress->mresidencia = $request->mresidencia;
        $registerAddress->localidad = $request->localidad;
        $registerAddress->calle = $request->calle;
        $registerAddress->numero = $request->numero;
        $registerAddress->calle1 = $request->calle1;
        $registerAddress->calle2 = $request->calle2;
        $registerAddress->colonia = $request->colonia;
        $registerAddress->cp = $request->cp;
        $registerAddress->save();

        $registerPerson = new Persona();
        $registerPerson->nombres = $request->nombres;
        $registerPerson->apellidop = $request->apellidop;
        $registerPerson->apellidom = $request->apellidom;
        $registerPerson->fechanac = $request->fechanac;
        $registerPerson->curp = $request->curp;
        $registerPerson->sexo = $request->sexo;
        $registerPerson->pindigena = $request->pindigena;
        $registerPerson->lindigena = $request->lindigena;
        $registerPerson->nacionalidad = $request->nacionalidad;
        $registerPerson->pnacionalidad = $request->pnacionalidad;
        $registerPerson->porigen = $request->porigen;
        if($request->nacionalidad=="Mexicana"){
            $registerPerson->emigrante = "No";
        }else{
            $registerPerson->emigrante = "Sí";
        }
        $registerPerson->telefonoc = $request->telefonoc;
        $registerPerson->ocupacion = $request->ocupacion;
        $registerPerson->inseducativa = $request->inseducativa;
        $registerPerson->idDireccion = $registerAddress->id;
        $registerPerson->idUsuario = Auth::user()->id;
        $registerPerson->save();

        DB::commit();
        return Redirect()->route('site.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}