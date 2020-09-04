@if($filter!='no-elect')
<table class="table table-bordered table-condensed table-hover table-sm header_table" cellspacing="0">
<thead>
    <th style="width: 35px">Cod.</th>
    <th style="width: 80px">Proy. Curricular</th>
    <th style="width: 85px">Esp. Académico</th> 
    {{-- <th style="width: 75px">Docente</th>  --}}
    <th style="width: 75px">Destino</th>
    <th style="width: 45px">Viat. Est.</th>
    <th style="width: 45px">Viat. Doc.</th>
    <th style="width: 45px">Transporte</th>
    <th style="width: 45px">Total</th>
    {{-- <th style="width: 25px">Coord.</th> --}}
    {{-- <th style="width: 25px">Consj.</th> --}}
    @if($filter == 'pend'|| ($filter == 'aprob-cons'))
    <th style="width: 35px"></th>
    @endif
</thead> 
@foreach ($proyecciones as $item) 
<tr>
   <td>{{ $item->id }}</td>
   <td>{{ $item->programa_academico }}</td>
   <td>{{ $item->espacio_academico }}</td>
    {{-- @if($item->id_estado_doc == 2)
    <td>Usuario Inactivo</td>
    @endif
    @if($item->id_estado_doc == 1)
    <td>{{ $item->full_name }}</td>
    @endif --}}
    @if($item->tipo_ruta == 1)
    <td>{{ $item->destino_rp }}</td>
    <td>{{ number_format($item->viaticos_estudiantes_rp, 0, ',','.') }}</td>
    <td>{{ number_format($item->viaticos_docente_rp, 0, ',','.') }}</td> 
    <td>{{ number_format($item->costo_total_transporte_menor_rp + $item->valor_estimado_transporte_rp, 0, ',','.') }}</td>
    <td>{{ number_format($item->total_presupuesto_rp, 0, ',','.') }}</td> 
    @endif
    @if($item->tipo_ruta == 2)
    <td>{{ $item->destino_ra }}</td>
    <td>{{ number_format($item->viaticos_estudiantes_ra, 0, ',','.') }}</td>
    <td>{{ number_format($item->viaticos_docente_ra, 0, ',','.') }}</td> 
    <td>{{ number_format($item->costo_total_transporte_menor_ra + $item->valor_estimado_transporte_ra, 0, ',','.') }}</td>
    <td>{{ number_format($item->total_presupuesto_ra, 0, ',','.') }}</td> 
    @endif
   {{-- <td>{{ $item->ab_coor }}</td>  --}}
   {{-- <td>{{ $item->es_consj }}</td> --}}
   @if($filter == 'pend' || ($filter == 'aprob-cons' && $item->id_estado_doc == 2))
   <td> 
       <a href="{{route('solicitud_edit',[$item->id,$item->tipo_ruta])}}">
       <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
       </a> 
   </td> 
   @endif
</tr>
@endforeach 
</table>
@endif

@if($filter=='no-elect')
<table class="table table-bordered table-condensed table-hover table-sm header_table" cellspacing="0" style="width: 60%">
    
    <thead style="text-align: center" style="margin-right: 20%;margin-left: 20%; width: 60%;">
        {{-- <th style="width: 425pxpx"> --}}
        ESPACIOS ACADÉMICOS NO ELECTIVOS SIN PROYECCIONES PRELIMINARES REGISTRADAS
        {{-- </th> --}}
    </thead> 
    <thead>
        <th style="width: 35px">ID.</th>
        <th style="width: 90px">Proy. Curricular</th>
        <th style="width: 95px">Esp. Académico</th> 
        @if($filter == 'pend')
        <th style="width: 37px"></th>
        @endif
    </thead> 
    @foreach ($proyecciones as $item) 
    <tr>
       <td>{{ $item->id }}</td>
       <td>{{ $item->programa_academico }}</td>
       <td>{{ $item->espacio_academico }}</td>
       
    </tr>
    @endforeach 
</table>
@endif
{{-- {{$proyecciones->render()}} --}}