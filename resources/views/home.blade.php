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

                    {{ __('Selecione uma opção') }}
                    <div class="mt-4">
                        <a href="{{ route('receber.index') }}" class="btn btn-success">Receber</a>
                        <a href="{{ route('pagar.index') }}" class="btn btn-danger">Pagar</a>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
