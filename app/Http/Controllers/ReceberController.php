<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\receber;

class ReceberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $receber = Receber::all();
        return view('receber.index', compact('receber'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('receber.create');
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
            'valor' => 'required|numeric',
            'adicional' => 'required|numeric',
            'total' => 'required|numeric',
            'observacao' => ''
        ]);
        $receber = Receber::create($storeData);
        //return redirect('/recebers')->with('completed', 'Conta cadastrada!');
        return redirect()->route('receber.index')->with('success','Conta criada com sucesso.');        
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
        $receber = Receber::findOrFail($id);
        return view('receber.edit', compact('receber'));        
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
            'valor' => 'required|numeric',
            'adicional' => 'required|numeric',
            'total' => 'required|numeric',
            'observacao' => 'required|max:255',
        ]);
        Receber::whereId($id)->update($updateData);
        //return redirect('/recebers')->with('completed', 'Conta Atualizada.');       
        return redirect()->route('receber.index')->with('success','Conta atualizada.'); 
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
        $receber = Receber::findOrFail($id);
        $receber->delete();
        //return redirect('/recebers')->with('completed', 'Conta apagada.');        
        return redirect()->route('receber.index')->with('success','Conta apagada!');
    }
}
