<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producao;
use Illuminate\Http\Request;

class ProducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producao = Producao::where('data', 'like', date("Y-m-d") . '%')->get();

        return view('producao.index')->with('producao', $producao);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('producao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producao = new Producao();
        $producao->sabor = $request->sabor;
        $producao->data = $request->data;
        $producao->quantidade = $request->quantidade;
        $producao->save();

        return to_route('producao.index');
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
    public function edit(Request $request)
    {
        $producao = Producao::find($request->id);
        return view('producao.edit')->with('producao', $producao);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producao $producao)
    {
        $producao = Producao::find($request->id);
//        $producao->sabor = $request->sabor;
//        $producao->data = $request->data;
//        $producao->quantidade = $request->quantidade;
        $producao->fill($request->all());
        $producao->save();

        return to_route('producao.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $producao = Producao::find($request->id);
        $producao->delete();

        return to_route('producao.index');
    }
}
