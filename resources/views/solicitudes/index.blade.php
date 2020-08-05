@extends ('layouts.app')
@section ('contenido')  

  
  <div class="container-fluid">
      <div class="card-header">{{ __('Listado de Solicitudes') }}</div>
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
      
      {{-- @if(Auth::user()->decano() || Auth::user()->asistenteD() || Auth::user()->admin() || Auth::user()->docente())
          
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
        <div class="form-group">
          <label for=""></label>
          <div class="row">
            <a href="{{route('export_list_proyecc.excel')}}"><button class="btn btn-success" title="Exportar Archivo Excel"><i class="fas fa-download"></i>     XSL</button></a>
          </div>
        </div>
      </div>  --}}

      {{-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <form method="POST" action="{{ route('import_list_proyecc.excel') }}"  enctype="multipart/form-data">
          @csrf
         
          <div class="row">
          {{-- <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">    --}}
            {{-- <div class="form-group">
              <label for=""></label>
                  <input type="file"  name="poyecciones_preliminares" style="color: rgb(243, 3, 3)">
            </div> --}}
          {{-- </div>  --}}
          
          {{-- <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">  --}}
            {{-- <div class="form-group"> --}}
              {{-- <label for=""></label>
              <div class="row"> --}}
                {{-- <button class="btn btn-success" name="import_proyecciones" title="Importar Archivo Excel"><i class="fas fa-file-import"></i>     CSV</button></a> --}}
              {{-- </div> --}}
            {{-- </div>
          </div> 
        </form> --}}
    {{-- </div> 
      @endif --}}

      {{-- <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
          <div class="form-group">
            <label for=""></label>
            <div class="row">
              <a href="{{route('proyeccion_preliminar.pdf')}}"><button class="btn btn-success" ><i class="fas fa-download"></i>     PDF</button></a>
            </div>
        </div>
      </div> --}}

      @if(Auth::user()->coordinador() || Auth::user()->docente())
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <form method="POST" action="{{ route('import_list_estud.excel') }}"  enctype="multipart/form-data">
          @csrf
         
          <div class="row">
          {{-- <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">    --}}
            {{-- <div class="form-group">
              <label for=""></label>
                  <input type="file"  name="listado_estudiantes" style="color: rgb(243, 3, 3)">
            </div> --}}
          {{-- </div>  --}}
          
          {{-- <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">  --}}
            {{-- <div class="form-group"> --}}
              {{-- <label for=""></label>
              <div class="row"> --}}
                {{-- <button class="btn btn-success" name="import_proyecciones" title="Importar Archivo Excel"><i class="fas fa-file-import"></i>     CSV</button></a> --}}
              {{-- </div> --}}
            </div>
          </div> 
        </form>
    </div>

      @endif

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          {{-- <table class="table table-bordered table-condensed table-hover table-sm" cellspacing="0" style="table-layout: fixed; width:100%; word-break: break-word; font-size: 12px"> --}}
            <!-- filtro -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                      <label for="id_filtro_proyeccion">Filtro</label>
                      <div class="row">
                          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="id_filtro_solicitud"   @if(!isset($filter)) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="1" checked>
                              <label class="form-check-label" for="">Todos</label>
                            </div>
                          </div>

                          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="id_filtro_solicitud"   @if(!isset($filter)) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="14" checked>
                              <label class="form-check-label" for="">Aprob.</label>
                            </div>
                          </div>
                          
                          @if(!Auth::user()->decano())
                          {{-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'send')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="2">
                              <label class="form-check-label" for="">Enviados</label>
                            </div>
                          </div> --}}
        
                          {{-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'not_send')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="3">
                                <label class="form-check-label" for="">Sin Enviar</label>
                            </div>
                          </div> --}}

                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'pre-proy')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="13">
                                <label class="form-check-label" for="">Proyecciones</label>
                            </div>
                          </div>
                          @endif

                          @if(Auth::user()->coordinador() || Auth::user()->decano() || Auth::user()->admin())
                          {{-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'ext_mu')) checked="true" @endif onclick="filtrar_proyecciones(this.value)" value="4">
                                <label class="form-check-label" for="">Extramurales</label>
                            </div>
                          </div> --}}

                          @if(Auth::user()->coordinador())
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'pend')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="7">
                                <label class="form-check-label" for="">Pendientes</label>
                            </div>
                          </div>

                          {{-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'not_aprob')) checked="true" @endif onclick="filtrar_proyecciones(this.value)" value="8">
                                <label class="form-check-label" for="">Sin Aprob.</label>
                            </div>
                          </div> --}}

                          @endif

                          @if(Auth::user()->decano() || Auth::user()->admin())
                          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'aprob')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="9">
                                <label class="form-check-label" for="">Aprob.</label>
                            </div>
                          </div>
                          @endif
                          @endif

                          @if(Auth::user()->asistenteD() || Auth::user()->admin())
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'sin_pres')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="5">
                                <label class="form-check-label" for="">Sin Presupuesto</label>
                            </div>
                          </div>

                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'no-aprob-cons')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="12">
                                <label class="form-check-label" for="">Sin Aprob. Consejo Facultad</label>
                            </div>
                          </div>
                          @endif

                          @if(Auth::user()->decano() || Auth::user()->admin())
                          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'elect')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="6">
                                <label class="form-check-label" for="">Electivas</label>
                            </div>
                          </div>
                          
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'no-elect')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="10">
                                <label class="form-check-label" for="">Oblig. Sin Proyección</label>
                            </div>
                          </div>

                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'pend')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="7">
                                <label class="form-check-label" for="">Pendientes</label>
                            </div>
                          </div>

                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_filtro_solicitud"  @if(isset($filter) and ($filter == 'aprob-cons')) checked="true" @endif onclick="filtrar_solicitudes(this.value)" value="11">
                                <label class="form-check-label" for="">Aprob. Consejo Facultad</label>
                            </div>
                          </div>
                          @endif

                      </div>
                  </div>
                </div>
            </div>
            <!-- filtro -->

            @if(Auth::user()->admin())
              @include('solicitudes.tablas.index_admin',$proyecciones)
            @endif  

            @if(Auth::user()->decano())
              @include('solicitudes.tablas.index_dec',$proyecciones)
            @endif 

            @if(Auth::user()->asistenteD())
              @include('solicitudes.tablas.index_asisDec',$proyecciones)
            @endif 

            @if(Auth::user()->coordinador())
              @include('solicitudes.tablas.index_coord',$proyecciones)
            @endif 

            @if(Auth::user()->docente())
              @include('solicitudes.tablas.index_docen',$proyecciones)
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

          
        </div>
        {{-- <div>
          <table class="table table-bordered table-condensed table-hover table-sm header_table" cellspacing="0">
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
         @foreach ($estudiantes as $item) 
         <tr>
          <td>{{ $item->id }}</td> --}}
             {{-- <td>{{ $item->id }}</td>
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
             </td>  --}}
         {{-- </tr>
         @endforeach 
          </table>
        </div> --}}
        {{-- {{$usuarios->render()}} --}}
        
    {{-- </div>
  </div> --}}
            
  
@endsection