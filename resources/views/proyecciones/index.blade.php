@extends ('layouts.app')
@section ('contenido')  

  
  <div class="container-fluid">
      <div class="card-header">{{ __('Listado de Proyecciones Preliminares') }}</div>
    <div class="row">
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
          <div class="form-group">
            {{-- <a href="{{url('persona_natural/create') }}"><button class="btn btn-success" >Nuevo</button></a> --}}
          </div>
        </div>
        
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              {{-- @include('persona.natural.search') --}}
        </div>
      </div>

      <!-- 0 -->
      {{-- <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                  <label for="id_estado_cliente">Estado</label>
                  <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="id_estado_cliente"  value="3" checked="checked" onclick="filterProyeccion(this.value)">
                          <label class="form-check-label" for="">Todos</label>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="id_estado_cliente"  value="1" onclick="filterProyeccion(this.value)">
                          <label class="form-check-label" for="">Activos</label>
                        </div>
                      </div>
    
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="id_estado_cliente"  value="2" onclick="filterProyeccion(this.value)">
                            <label class="form-check-label" for="">Inactivos</label>
                        </div>
                      </div>

                  </div>
              </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            </div>
            
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <div class="form-group">
                <label for=""></label>
                <div class="row">
                  <a href="{{route('proyeccion_preliminar.pdf')}}"><button class="btn btn-success" ><i class="fas fa-download"></i>     PDF</button></a>
                </div>
            </div>
          </div>
      </div> --}}
      <!-- 0 -->
      {{-- <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
          <div class="form-group">
            <label for=""></label>
            <div class="row">
              <a href="{{route('proyeccion_preliminar.pdf')}}"><button class="btn btn-success" ><i class="fas fa-download"></i>     PDF</button></a>
            </div>
        </div>
      </div> --}}
      
      @if(Auth::user()->decano() || Auth::user()->asistenteD() || Auth::user()->admin())
          
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
        <div class="form-group">
          <label for=""></label>
          <div class="row">
            <a href="{{route('export_list_proyecc.excel')}}"><button class="btn btn-success" ><i class="fas fa-download"></i>     XSL</button></a>
          </div>
        </div>
      </div> 
      @endif

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <table class="table table-bordered table-condensed table-hover table-sm" cellspacing="0" style="table-layout: fixed; width:100%; word-break: break-word; font-size: 12px">
            
            @if(Auth::user()->admin())
              @include('proyecciones.tablas.index_admin',$proyecciones)
            @endif  

            @if(Auth::user()->decano())
              @include('proyecciones.tablas.index_dec',$proyecciones)
            @endif 

            @if(Auth::user()->asistenteD())
              @include('proyecciones.tablas.index_asisDec',$proyecciones)
            @endif 

            @if(Auth::user()->coordinador())
              @include('proyecciones.tablas.index_coord',$proyecciones)
            @endif 

            @if(Auth::user()->docente())
              @include('proyecciones.tablas.index_docen',$proyecciones)
            @endif

            {{-- @if(Auth::user()->adminPerm())
           <thead>
            <th style="width: 33px">Cod.</th>
            <th style="width: 90px">Proy. Curricular</th>
            <th style="width: 95px">Esp. Académico</th> 
            <th style="width: 105px">Destino RP</th>
            <th style="width: 35px">Fecha Salida</th>
            <th style="width: 37px">Fecha Regreso</th>
            <th style="width: 25px">Coord.</th>
            <th style="width: 25px">Decan.</th>
            <th style="width: 37px"></th>
           </thead> 
           @foreach ($proyecciones as $item) 
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->programa_academico }}</td>
                <td>{{ $item->espacio_academico }}</td>
                <td>{{ $item->destino_rp }}</td>
                <td>{{ $item->fecha_salida_aprox_rp }}</td>
                <td>{{ $item->fecha_regreso_aprox_rp }}</td> 
                <td>{{ $item->ab_coor }}</td> 
                <td>{{ $item->ab_dec }}</td> 
                <td> 
                 <a href="{{route('proyeccion_edit',$item->id)}}">
                   <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
                 </a> 
                </td> 
              </tr>
            @endforeach
            {{-- @endif --}}

            {{-- @elseif(Auth::user()->otrosPerm())
              <thead>
                  <th style="width: 35px">Cod.</th>
                  <th style="width: 90px">Proy. Curricular</th>
                  <th style="width: 95px">Esp. Académico</th> 
                  <th style="width: 105px">Destino Ruta Principal</th>
                  <th style="width: 35px">Fecha Salida</th>
                  <th style="width: 35px">Fecha Regreso</th>
                  <th style="width: 25px">Coord.</th>
                  <th style="width: 25px">Decan.</th>
                  <th style="width: 37px"></th>
             </thead> 
             @foreach ($proyecciones as $item) 
             <tr>
                 <td>{{ $item->id }}</td>
                 <td>{{ $item->programa_academico }}</td>
                 <td>{{ $item->espacio_academico }}</td>
                 <td>{{ $item->destino_rp }}</td>
                 <td>{{ $item->fecha_salida_aprox_rp }}</td>
                 <td>{{ $item->fecha_regreso_aprox_rp }}</td> 
                 <td>{{ $item->ab_coor }}</td> 
                 <td>{{ $item->ab_dec }}</td>
                 <td> 
                     <a href="{{route('proyeccion_edit',$item->id)}}">
                     <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
                     </a> 
                 </td> 
             </tr>
             @endforeach 
            @endif --}}
          </table>
        </div>
        {{-- {{$usuarios->render()}} --}}
        
    {{-- </div>
  </div> --}}
            
  
@endsection