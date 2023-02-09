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
      <h1>EMPRESAS</h1>
    </div>
    <div class="col-md-6">
      <a href="{{ route('empresa.create') }}" class="btn btn-primary btn-sm float-end">Novo</a>
    </div>    
  </div>
  
  <table class="table">
    <thead>
        <tr class="table-dark">
          <td>ID</td>
          <td>Nome</td>
          <td>Contato</td>
          <td>Site</td>
          <td>Observação</td>
          <td>Tipo</td>
          <td class="text-center">Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($empresa as $empresas)
        <tr>
            <td>{{$empresas->id}}</td>
            <td>{{$empresas->nome}}</td>
            <td>{{$empresas->contato}}</td>
            <td>{{$empresas->site}}</td>
            <td>{{$empresas->observacao}}</td>
            <td>
              @if($empresas->receber) <span class="badge bg-success">Receber</span> @endif 
              @if($empresas->pagar) <span class="badge bg-danger">Pagar</span> @endif              
            </td>
            <td class="text-center">
                <a href="{{ route('empresa.edit', $empresas->id)}}" class="btn btn-primary btn-sm">Editar</a>
                <a href="#!" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$empresas->id}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@foreach($empresa as $empresas)
  <!-- Modal -->
  <div class="modal fade" id="modal-{{$empresas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja excluir realmente?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3>ID: {{$empresas->id}}</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
          <form action="{{ route('empresa.destroy', $empresas->id)}}" method="post" style="display: inline-block">
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