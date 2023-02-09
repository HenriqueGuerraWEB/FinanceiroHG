@extends('layouts.app')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="row">
    <div class="col-md-6">
      <h1>PAGAR</h1>
    </div>
    <div class="col-md-6">
      <a href="{{ route('pagar.create') }}" class="btn btn-primary btn-sm float-end">Novo</a>
    </div>    
  </div>
  <table class="table">
    <thead>
        <tr class="table-dark">
          <td>ID</td>
          <td>Data</td>
          <td>Empresa</td>
          <td>Valor</td>
          <td>Observação</td>
          <td class="text-center">Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pagar as $pagars)
        <tr>
            <td>{{$pagars->id}}</td>
            <td>{{ date('d/m/Y', strtotime($pagars->data)); }}</td>
            <td>{{$pagars->empresa->nome}}</td>
            <td>{{$pagars->valor}}</td>
            <td>{{$pagars->observacao}}</td>
            <td class="text-center">
                <a href="{{ route('pagar.edit', $pagars->id)}}" class="btn btn-primary btn-sm">Editar</a>
                <a href="{{ route('pagar.edit', $pagars->id)}}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$pagars->id}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

  @foreach($pagar as $pagars)
  <!-- Modal -->
  <div class="modal fade" id="modal-{{$pagars->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja excluir realmente?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3>ID: {{$pagars->id}}</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
          <form action="{{ route('pagar.destroy', $pagars->id)}}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"" type="submit">Excluir</button>
          </form>        
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection