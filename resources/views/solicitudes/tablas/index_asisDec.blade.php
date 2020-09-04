
<table class="table table-bordered table-condensed table-hover table-sm header_table" cellspacing="0">
    <thead>
        @if($filter == 'not_send')
        <th style="width: 15px">Sel.</th>
        @endif
        <th style="width: 35px">Cod.</th>
        <th style="width: 80px">Proy. Curricular</th>
        <th style="width: 85px">Esp. Académico</th> 
        <th style="width: 75px">Docente</th> 
        <th style="width: 75px">Destino</th>
        <th style="width: 50px">Fecha Salida</th>
        <th style="width: 50px">Fecha Regreso</th>
        @if($filter != 'pend')
        <th style="width: 25px">Coord.</th>
        @if($filter == 'no-aprob-cons' || $filter == 'all')
        <th style="width: 25px">Decan.</th>
        @endif
        <th style="width: 25px">Consj.</th>
        @endif
        @if($filter == 'sin_pres' || $filter == 'no-aprob-cons' || $filter == 'pend')
        <th style="width: 35px"></th>
        @endif
        
        
    </thead> 
    @foreach ($proyecciones as $item) 
    <tr>
        @if($filter == 'not_send')
       <td><input type="checkbox" id="{{ $item->id }}" name="confirm_list[]" value="{{ $item->id }}"  <?php if($filter != 'not_send') echo 'disabled'?>></td>
       @endif
       <td>{{ $item->id }}</td>
       <td>{{ $item->programa_academico }}</td>
       <td>{{ $item->espacio_academico }}</td>
       @if($item->id_estado_doc == 1)
       <td>{{ $item->full_name }}</td>
       @endif
       @if($item->id_estado_doc == 2)
       <td>Usuario Inactivo</td>
       @endif
       <td>{{ $item->destino_rp }}</td>
       <td>{{ $item->fecha_salida_aprox_rp }}</td>
       <td>{{ $item->fecha_regreso_aprox_rp }}</td>
       @if($filter != 'pend') 
       <td>{{ $item->ab_coor }}</td> 
       @if($filter == 'no-aprob-cons' || $filter == 'all')
       <td>{{ $item->ab_dec }}</td>
       @endif
       <td>{{ $item->es_consj }}</td>
       @endif
       @if($filter == 'sin_pres' || $filter == 'no-aprob-cons' || $filter == 'pend')
       <td> 
           <a href="{{route('solicitud_edit',[$item->id,$item->tipo_ruta])}}">
           <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
           </a> 
        </td> 
        @endif
    </tr>
    @endforeach 
</table>
    {{-- @if(!empty($item->valor_estimado_transporte_rp)  && !empty($item->valor_estimado_transporte_ra)) --}}
        @if($filter == 'not_send')
        {{-- <input type="text" id="nefy" name="nefy" value=""> --}}
            <button class="btn-success" style="background-color: #447161; border:0" name="confirmar_proyecc" id="confirmar_proyecc" onclick="confirm_proy()">Confirmar</button>
       @endif
    {{-- @endif --}}