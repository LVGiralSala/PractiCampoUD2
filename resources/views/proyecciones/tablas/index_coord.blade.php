<table class="table table-bordered table-condensed table-hover table-sm header_table" cellspacing="0">
    <thead>
        @if($filter == 'not_send')
        <th style="width: 10px">Sel.</th>
        @endif 
        <th style="width: 35px">Cod.</th>
        <th style="width: 90px">Proy. Curricular</th>
        <th style="width: 95px">Esp. Académico</th> 
        @if($filter == 'pend')
        <th style="width: 95px">Docente</th> 
        @endif
        <th style="width: 105px">Destino Ruta Principal</th>
        <th style="width: 35px">Fecha Salida</th>
        <th style="width: 35px">Fecha Regreso</th>
        <th style="width: 25px">Coord.</th>
        @if($filter == 'pend')
        <th style="width: 37px"></th>
        @endif
    </thead> 
    @foreach ($proyecciones as $item) 
    <tr>
    @if($filter == 'not_send')
    <td><input type="checkbox" id="{{ $item->id }}" name="confirm_list[]" value="{{ $item->id }}" <?php if($filter != 'not_send') echo 'disabled'?>></td>  
    @endif  
    <td>{{ $item->id }}</td>
    <td>{{ $item->programa_academico }}</td>
    <td>{{ $item->espacio_academico }}</td>
    @if($filter == 'pend')
    <td>{{ $item->full_name }}</td>
    @endif
    <td>{{ $item->destino_rp }}</td>
    <td>{{ $item->fecha_salida_aprox_rp }}</td>
    <td>{{ $item->fecha_regreso_aprox_rp }}</td> 
    <td>{{ $item->ab_coor }}</td> 
    @if($filter == 'pend')
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
    <button class="btn-success" style="background-color: #447161; border:0" name="confirmar_proyecc" id="confirmar_proyecc" onclick="validar_proy_electiva()">Confirmar</button>
@endif
{{-- onclick="confirm_proy_coord()" --}}
