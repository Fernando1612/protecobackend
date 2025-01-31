<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comprobante;
use App\Models\Ficha;
use App\Models\Ticket;


class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comprobante.create');
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
            'no_ficha' => 'min:20|max:20',
        ]);

        $ficha = Ficha::all()->where('id',$request->ficha_id)->first();
        // $ficha->comprobante=1;
        // $ficha->save();

        $comprobante = new Comprobante();
        $comprobante->fecha = $request->fecha;
        $comprobante->metodo_pago = $request->metodo_pago;
        $comprobante->banco = $request->banco;
        $comprobante->no_ficha = $request->no_ficha;
        $comprobante->ultimos_digitos = $request->ultimos_digitos;
        $comprobante->cie = $request->cie;
        $comprobante->monto = $ficha->monto;
        $comprobante->ficha_id = $request->ficha_id;
        // $comprobante->ticket_id =  $request->ticket_id;

        $captura = $request->captura;
        $name=utf8_encode(auth()->user()->fname.auth()->user()->lname)."Comprobante".$request->ficha_id.".".$captura->getClientOriginalExtension();
        $destination = public_path() . '/comprobantes/';
        $captura->move($destination, $name);
        $comprobante->captura=$name;
        $comprobante->save();


        // $ticket_update = Ticket::all()->where('id', $request->ticket_id)->first();

        // contar fichas del ticket
        $fichas_ticket = Ficha::where('ticket_id', $request->ticket_id)->get();
        $comprobantes = Comprobante::all();
        $banderaC = 0;

        foreach($fichas_ticket as $ficha){
            // tengo ficha 36 y 2
            foreach($comprobantes as $comprobante){
                if($comprobante->ficha_id == $ficha->id){
                    $banderaC = $banderaC + 1;
                }
            }
        }

        $nofichas = Ficha::where('ticket_id', $request->ticket_id)->get()->count();


        // contar comprobantes del ticket
        // $comprobantes_ticket = Comprobante::where('ticket_id', $request->ticket_id)->get()->count();

        if($nofichas==$banderaC){
            $ticket_update = Ticket::all()->where('id', $ficha->ticket_id)->first();
            $ticket_update->status = "Pago recibido. Pendiente de aprobación";
            $ticket_update->save();
        }
        // return $ficha;

        return redirect()->route('perfil.index')->with('success', 'Información enviada exitosamente');
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
