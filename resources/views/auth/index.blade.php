@extends ('layouts.app')
@section ('contenido')  

  
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
          <div class="form-group">
            {{-- <a href="{{url('persona_natural/create') }}"><button class="btn btn-success" >Nuevo</button></a> --}}
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
          <div class="form-group">
              
            {{-- <a href="{{route('pn.excel')}}"><button class="btn btn-success" ><i class="fas fa-download"></i>     Exportar</button></a> --}}
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              {{-- @include('persona.natural.search') --}}
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <table class="table table-bordered table-condensed table-hover table-sm" cellspacing="0" style="table-layout: fixed; width:100%; word-break: break-word; font-size: 12px">
           <thead>
            <th style="width: 22px">TI</th>
            <th style="width: 60px">Identificación</th>
            <th style="width: 85px">Nombres</th> 
            <th style="width: 85px">Apellidos</th>
            {{-- <th style="width: 80px">Dirección</th>
            <th style="width: 60px">Celular</th>
            <th style="width: 110px">E-Mail</th>
            <th style="width: 25px">PEPS</th>
            <th style="width: 39px">Acción</th> --}}
           </thead> 
            @foreach ($usuarios as $item) 
                   <tr>
                     <td>{{ $item->sigla}}</td>
                     <td>{{ $item->usuario }}</td>
                     <td>{{ $item->primer_nombre }}</td>
                     <td>{{ $item->role }}</td> 
                     {{-- <td>{{ $item->direccion_residencia }}</td>
                     <td>{{ $item->celular }}</td>
                     <td>{{ $item->email }}</td>
                     <td>{{ $item->persona_expuesta_publicamente }}</td> --}}
                     {{-- <td> 
                      <a href="{{URL::action('RegisterController@edit',$item->id)}}"><button class="btn-success" style="background-color: #447161; border:0">Editar</button></a>
                     </td> --}}
                   </tr>
            @endforeach 
          </table>
            
        </div>
        {{-- {{$usuarios->render()}} --}}
        
    {{-- </div>
  </div> --}}
            
  
@endsection