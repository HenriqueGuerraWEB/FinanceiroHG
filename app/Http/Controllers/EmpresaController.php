<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empresa = Empresa::all();
        return view('empresa.index', compact('empresa'));          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $storeData = $request->validate([
            'nome' => 'required|max:255',
            'contato' => 'numeric',
            'site' => '',
            'observacao' => '',
            'tipo' => ''
        ]);
        $empresa = Empresa::create($storeData);
        return redirect()->route('empresa.index')->with('success','Empresa criada com sucesso.');  
        */       
        $row = $request->all();
        // dd($row);
        $request->validate([
            'nome' => 'required|max:255',
            'contato' => 'numeric',
            'site' => '',
            'observacao' => '',
            'receber' => '',
            'pagar' => '',            
        ]);
        
        $row['receber'] = (isset($row['receber'])) ? 1 : 0;
        $row['pagar'] = (isset($row['pagar'])) ? 1 : 0;
        //dd($row);
        Empresa::create($row);
        return redirect()->route('empresa.index')
                        ->with('Sucesso','Empresa cadastrada com sucesso!');         
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
        $empresa = Empresa::findOrFail($id);
        return view('empresa.edit', compact('empresa'));         
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
        $row = $request->all();
        // dd($row);
        $request->validate([
            'nome' => 'required|max:255',
            'contato' => 'numeric',
            'site' => '',
            'observacao' => '',
            'receber' => '',
            'pagar' => '',            
        ]);
        
        $row['receber'] = (isset($row['receber'])) ? 1 : 0;
        $row['pagar'] = (isset($row['pagar'])) ? 1 : 0;
        //dd($row);
        Empresa::find($id)->update($row);
        return redirect()->route('empresa.index')
                        ->with('Sucesso','Empresa cadastrada com sucesso!');        
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
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return redirect()->route('empresa.index')->with('success','Empresa apagada!');        
    }
}