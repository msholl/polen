<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Embalagem;
use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        $estoque = Estoque::all();
        $estoque = DB::table('estoque')
            ->join('embalagem', 'estoque.embalagem_id', '=', 'embalagem.id')
            ->select('estoque.*', 'embalagem.descricao as embalagem')
            ->get();

        return view('estoque.index')->with('estoque', $estoque);
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
    public function update(Request $request, Estoque $estoque)
    {
//        dd($request);
        $estoque = Estoque::find($request->id);
        if ($request->operacao == '+') {
            $estoque->quantidade += $request->quantidadeOperacao;
        } else {
            $estoque->quantidade -= $request->quantidadeOperacao;
        }
//        $estoque->quantidade = $request->quantidade;
        $estoque->save();
        return redirect()->route('estoque.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
