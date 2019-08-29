@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
   <h3>Revisar propuesta</h3>
@endsection

<style type="text/css">
    .highlighter{
        color: darkblue;
    }

    .AlertRechazoHide{
        display: none;
    }

    .AlertRechazoShow(){
        display: block;
    }

    .textoAlerta{
        font-size: 1.3em;
        font-weight: bold;
        font-family: sans-serif;
    }

    h2{
        color: black !important;
    }

</style>

@section('contenedor')
        <script type="text/javascript">
            var items = [];
            function obtenerItem(id) {
                for (let i = 0; i < items.length; i++) {
                    if (items[i].id == id)
                        return items[i];
                }
                return null;
            }
            function checkItem(id, formato, descripcion, checked){
                let textarea = document.getElementById('rechazo');
                if (!checked){
                    items.push({
                        id : id,
                        formato: formato, 
                        descripcion : descripcion
                    });
                    textarea.value += formato + ": " +   descripcion + "." + '\n';
                }
                else {
                    let item = obtenerItem(id);
                    if (item !== null)
                        items.splice(items.indexOf(item), 1);
                    textarea.value = '\n' +textarea.value.replace(descripcion, '');
                }
            }
        </script>

       <div class='content-fluid'>
       <div class="desplazamiento">
           
        <h4>Tema: <strong class="highlighter">{{$datos->nombrepropuesta}}</strong></h4>

       
        @if($errors->any())
        <div class="alert alert-danger"><h4>{{$errors->first()}}</h4></div>
        @endif
        @if (session()->has('flash'))
            <div class="alert alert-info textoAlerta"> {{ session('flash')}}</div>
        @endif
            <div id="RechazoDiv" class="alert alert-danger AlertRechazoHide"> <h2 class="NotifyText">Se ha rechazado la propuesta!!!</h2></div>

                <div class="box-body">
                        <table class="table table-hover table-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Formato</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Validar</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <form action="/gestion/guardar" method="post">
                                    @csrf
                                @foreach ($temas as $key=>$item)
                                    
                                    <input type="text" value={{$datos->id}} name="idpropuesta" hidden>
                                    <input type="text" value={{$datos->idEstado}} name="idestado" hidden>
                                    <tr>
                                        <th scope="row"><input type="text" value={{$item->id}} name="idtema[]" hidden>*</th>
                                        <td>{{$item['nombre']}}</td>
                                        <td>{{$item['descripcion']}}</td>
                                        <td>
                                            @if ($item['califica']=='1')
                                                <div class="form-check">
                                                    <input onchange="checkItem('{{$datos->id}}','{{$item['nombre']}}', '{{$item['descripcion']}}', true)" checked type="radio" name="gestion[{{$key}}]" value="S"> Sí
                                                </div>
                                                <div class="form-check">
                                                    <input onchange="checkItem('{{$datos->id}}','{{$item['nombre']}}', '{{$item['descripcion']}}', false)" type="radio" name="gestion[{{$key}}]" value="N"> No
                                                </div>
                                            @else
                                                <div class="form-check">
                                                    <input onchange="checkItem('{{$datos->id}}','{{$item['nombre']}}', '{{$item['descripcion']}}', true)" type="radio" name="gestion[{{$key}}]" checked value="S"> Sí
                                                </div>
                                                <div class="form-check">
                                                    <input onchange="checkItem('{{$datos->id}}','{{$item['nombre']}}', '{{$item['descripcion']}}', false)"  type="radio" name="gestion[{{$key}}]" value="N"> No
                                                </div>
                                            @endif
                                            
                                        </td>
                                       
                                        <td>

                                        </td>
                                    </tr>
                                
                                @endforeach
                                </tbody>
                        </table>     
                        
                </div> 
                <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-rigth"><i class="fa fa-save"></i>  Guardar</button>
                        <a href="{{ url('gestion') }}" class="btn btn-primary pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
                        

                </div> 
                </form> 
        </div>
        <form action="actualizaestado" method="post">
            @csrf
            <input type="text" value={{$datos->id}} name="idpropuesta" hidden>
            <div><strong>Por favor si en caso de Rechazo, identifique porque no paso la revisión</strong></div>
        <textarea id="rechazo" rows="5" cols="100" wrap="soft"  name="rechazo" required>{{$datos->motivorechazo}}</textarea><br>
            <button type="submit" class="btn btn-danger pull-rigth"><i class="fa fa-save"></i>  Rechazar</button>

        </form> 
       </div>

@endsection
