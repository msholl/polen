<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntregasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entregas = Entrega::where('data_entrega', 'like', date("Y-m-d") . '%')->orderby('ordem')->get();

        return view('entregas.index')->with('entregas', $entregas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrega $entrega)
    {
//        dd($request);
        $entrega = Entrega::find($request->id);

        if (isset($entrega)) {
            if ($request->entregue == 1) {
                $entrega->entregue = 1;
                $entrega->data_entrega = date('Y-m-d H:i:s');
                $entrega->entregador = Auth::user()->name;
            } else {
                $entrega->entregue = 0;
                $entrega->data_entrega = null;
                $entrega->entregador = null;
            }
            $entrega->save();
        }

        return to_route('entregas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
