<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pagar;
use App\Models\receber;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pagar = Pagar::all();
        $receber = Receber::all();
        return view('home', compact('pagar', 'receber'));
    }
}
