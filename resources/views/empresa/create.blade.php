@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
          Criar empresa
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
            <form method="post" action="{{ route('empresa.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nome">Empresa</label>
                            <input type="text" class="form-control" name="nome"/>
                        </div>
                    </div>                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="contato">Contato</label>
                            <input type="number" class="form-control" name="contato"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="site">Site</label>
                            <input type="text" class="form-control" name="site"/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <div class="row mt-1 p-2">

                                <div class="form-check form-switch col-md-6">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="receber"
                                    @if(isset ($empresa))
                                        @if($empresa->receber)
                                            checked
                                        @endif
                                    @endif                                    
                                    >
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Contas a Receber</label>
                                </div>
                                <div class="form-check form-switch col-md-6">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="pagar"
                                    @if(isset ($empresa))
                                        @if($empresa->pagar)
                                            checked
                                        @endif
                                    @endif                                     
                                    >
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Contas a Pagar</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                        <div class="form-group">
                            <label for="observacao">Observação</label>
                            <textarea name="observacao" id="observacao" cols="30" rows="10" class="form-control"></textarea>
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