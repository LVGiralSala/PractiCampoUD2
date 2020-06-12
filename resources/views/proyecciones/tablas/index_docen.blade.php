{{-- <!-- filtro -->
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <div class="form-group">
          <label for="id_filtro_proyeccion">Filtro</label>
          <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="id_filtro_proyeccion"   @if(!isset($filter)) checked="true" @endif onclick="filtrar_proyecciones(this.value)" value="1" checked>
                  <label class="form-check-label" for="">Todos</label>
                </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="id_filtro_proyeccion"  @if(isset($filter) and ($filter == 'send')) checked="true" @endif onclick="filtrar_proyecciones(this.value)" value="2">
                  <label class="form-check-label" for="">Enviados</label>
                </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="id_filtro_proyeccion"  @if(isset($filter) and ($filter == 'not_send')) checked="true" @endif onclick="filtrar_proyecciones(this.value)" value="3">
                    <label class="form-check-label" for="">Sin Enviar</label>
                </div>
              </div>

          </div>
      </div>
    </div>
</div>
<!-- filtro --> --}}

<table class="table table-bordered table-condensed table-hover table-sm header_table" cellspacing="0">
    <thead>
        @if($filter == 'not_send')
        <th style="width: 15px">Sel.</th>
        @endif
        <th style="width: 35px">Cod.</th>
        <th style="width: 80px">Proy. Curricular</th>
        <th style="width: 85px">Esp. Académico</th> 
        <th style="width: 75px">Destino Ruta Principal</th>
        <th style="width: 35px">Fecha Salida</th>
        <th style="width: 35px">Fecha Regreso</th>
        <th style="width: 25px">Coord.</th>
        {{-- <th style="width: 25px">Decan.</th> --}}
        @if($filter == 'not_send')
        <th style="width: 37px"></th>
        @endif
    </thead> 
    <tr>
    @foreach ($proyecciones as $item) 
    @if($filter == 'not_send')
    <td><input type="checkbox" id="{{ $item->id }}" name="confirm_list[]" value="{{ $item->id }}"  <?php if($filter != 'not_send') echo 'disabled'?>></td>
    @endif
    <td>{{ $item->id }}</td>
    <td>{{ $item->programa_academico }}</td>
    <td>{{ $item->espacio_academico }}</td>
    <td>{{ $item->destino_rp }}</td>
    <td>{{ $item->fecha_salida_aprox_rp }}</td>
    <td>{{ $item->fecha_regreso_aprox_rp }}</td> 
    <td>{{ $item->ab_coor }}</td> 
    {{-- <td>{{ $item->ab_dec }}</td> --}}
    @if($filter == 'not_send')
    <td> 
       <a href="{{route('proyeccion_edit',$item->id)}}">
       <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
       </a> 
    </td> 
    @endif
</tr>
@endforeach 

</table>
{{$proyecciones->render()}}

@if($filter == 'not_send')
{{-- <input type="text" id="nefy" name="nefy" value=""> --}}
    <button class="btn-success" style="background-color: #447161; border:0" name="confirmar_proyecc" id="confirmar_proyecc" onclick="confirm_proy()">Confirmar</button>
@endif



