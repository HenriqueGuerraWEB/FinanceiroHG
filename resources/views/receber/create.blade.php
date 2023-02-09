@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
          Criar conta a receber
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
            <form method="post" action="{{ route('receber.store') }}">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            @csrf
                            <label for="data">Data</label>
                            <input type="date" class="form-control" name="data"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="empresa">Empresa</label>
                            <!--<input type="text" class="form-control" name="empresa"/>-->
                            <select id="select-beast" placeholder="Selecione uma opção..." autocomplete="on" name="empresa_id">
                                <option value="">Selecione uma opção...</option>                                
                                @foreach($empresas as $empresa)   
                                    @if($empresa->receber)                     
                                        <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                                    @endif
                                @endforeach
                            </select>                            
                        </div>
                    </div>                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input id="soma1" type="number" class="form-control somarInput" name="valor"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="adicional">Valor Adicional</label>
                            <input id="soma2" type="number" class="form-control somarInput" name="adicional"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="total">Valor Total</label>
                            <input id="result" type="number" class="form-control" name="total"/>
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
<script>
    jQuery(document).ready(function(){
      jQuery('.somarInput').on('keyup',function(){
        if(jQuery(this).attr('name') === 'result'){
        return false;
        }
      
        var soma1 = (jQuery('#soma1').val() == '' ? 0 : jQuery('#soma1').val());
        var soma2 = (jQuery('#soma2').val() == '' ? 0 : jQuery('#soma2').val());
        var result = (parseInt(soma1) + parseInt(soma2));
        jQuery('#result').val(result);
      });
    });  
    new TomSelect("#select-beast",{
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });    
</script>
@endsection