<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pagar;
use App\Models\Empresa;

class PagarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagar = Pagar::all();
        return view('pagar.index', compact('pagar'));         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empresas = Empresa::all();
        return view('pagar.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $storeData = $request->validate([
            'data' => 'required|max:255',
            'empresa_id' => 'required|numeric',
            'valor' => 'required|numeric',
            'observacao' => ''
        ]);
        $pagar = Pagar::create($storeData);
        //return redirect('/recebers')->with('completed', 'Conta cadastrada!');
        return redirect()->route('pagar.index')->with('success','Conta criada com sucesso.');         
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
        $empresas = Empresa::all();
        $pagar = Pagar::findOrFail($id);
        return view('pagar.edit', compact('pagar', 'empresas'));         
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
        $updateData = $request->validate([
            'data' => 'required|max:255',
            'empresa_id' => 'required|numeric',
            'valor' => 'required|numeric',
            'observacao' => ''
        ]);
        Pagar::whereId($id)->update($updateData);
        //return redirect('/recebers')->with('completed', 'Conta Atualizada.');       
        return redirect()->route('pagar.index')->with('success','Conta atualizada.');         
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
        $pagar = Pagar::findOrFail($id);
        $pagar->delete();
        //return redirect('/recebers')->with('completed', 'Conta apagada.');        
        return redirect()->route('pagar.index')->with('success','Conta apagada!');        
    }
}
