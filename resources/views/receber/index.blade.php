@extends('receber.layout')
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
  <table class="table">
    <thead>
        <tr class="table-dark">
          <td>ID</td>
          <td>Data</td>
          <td>Valor</td>
          <td>Valor Adicional</td>
          <td>Valor Total</td>
          <td>Observação</td>
          <td class="text-center">Ação</td>
        </tr>
    </thead>
    <tbody>
        @foreach($receber as $recebers)
        <tr>
            <td>{{$recebers->id}}</td>
            <td>{{$recebers->data}}</td>
            <td>{{$recebers->valor}}</td>
            <td>{{$recebers->adicional}}</td>
            <td>{{$recebers->total}}</td>
            <td>{{$recebers->observacao}}</td>
            <td class="text-center">
                <a href="{{ route('receber.edit', $recebers->id)}}" class="btn btn-primary btn-sm">Editar</a>
                <a href="{{ route('receber.edit', $recebers->id)}}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$recebers->id}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@foreach($receber as $recebers)
  <!-- Modal -->
  <div class="modal fade" id="modal-{{$recebers->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja excluir realmente?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3>ID: {{$recebers->id}}</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
          <form action="{{ route('receber.destroy', $recebers->id)}}" method="post" style="display: inline-block">
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