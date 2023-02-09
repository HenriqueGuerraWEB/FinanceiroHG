@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Painel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            {{ __('Selecione uma opção') }}
                            <div class="mt-4">
                                <a href="{{ route('empresa.index') }}" class="btn btn-primary">Empresas</a>
                                <a href="{{ route('receber.index') }}" class="btn btn-success">Receber</a>
                                <a href="{{ route('pagar.index') }}" class="btn btn-danger">Pagar</a>                    
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            @foreach ($receber as $recebers)
                                {{$recebers->total}}
                            @endforeach
                            <p><b>Total a receber:</b> #VALOR</p>
                            @foreach ($pagar as $pagars)
                                {{$pagars->valor}}
                            @endforeach                            
                            <p><b>Total a Pagar:</b> #VALOR</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
