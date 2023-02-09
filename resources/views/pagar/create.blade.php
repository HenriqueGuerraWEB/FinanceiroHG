@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
          Criar conta a pagar
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
            <form method="post" action="{{ route('pagar.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="data">Data</label>
                            <input type="date" class="form-control" name="data"/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="empresa">Empresa</label>
                            <!--<input type="text" class="form-control" name="empresa"/>-->
                            <select id="select-beast" placeholder="Selecione uma opção..." autocomplete="on" name="empresa_id">
                                <option value="">Selecione uma opção...</option>                                
                                @foreach($empresas as $empresa)   
                                    @if($empresa->pagar)                     
                                        <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                                    @endif
                                @endforeach
                            </select>                            
                        </div>
                    </div>                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="number" class="form-control" name="valor"/>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                        <div class="form-group">
                            <label for="observacao">Observação</label>
                            <textarea name="observacao" id="observacao" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-success" style="width: 100%">Criar nova conta a pagar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
</div>
<script>
new TomSelect("#select-beast",{
    create: true,
    sortField: {
        field: "text",
        direction: "asc"
    }
});    
</script>
@endsection