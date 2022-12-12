@extends('receber.layout')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
          Editar conta a receber
        </div>
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div><br />
          @endif
            <form method="post" action="{{ route('receber.update', $receber->id) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="data">Data</label>
                            <input type="date" class="form-control" name="data" value="{{ $receber->data }}"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="number" class="form-control" name="valor" value="{{ $receber->valor }}"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="adicional">Valor Adicional</label>
                            <input type="number" class="form-control" name="adicional" value="{{ $receber->adicional }}"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="total">Valor Total</label>
                            <input type="number" class="form-control" name="total" value="{{ $receber->total }}"/>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                        <div class="form-group">
                            <label for="observacao">Observação</label>
                            <textarea name="observacao" id="observacao" cols="30" rows="10" class="form-control">{{ $receber->observacao }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-success" style="width: 100%">Criar nova conta a receber</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
</div>
@endsection