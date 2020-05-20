@foreach ($proyecciones as $item) 
<form method="POST" action="{{ route('proyeccion_send',$item->id) }}">
    @method('PUT')
    @csrf

<table class="table table-bordered table-condensed table-hover table-sm" cellspacing="0" style="table-layout: fixed; width:100%; word-break: break-word; font-size: 12px">
<thead>
    <th style="width: 35px">Cod.</th>
    <th style="width: 90px">Proy. Curricular</th>
    <th style="width: 95px">Esp. Académico</th> 
    <th style="width: 105px">Destino Ruta Principal</th>
    <th style="width: 35px">Fecha Salida</th>
    <th style="width: 35px">Fecha Regreso</th>
    <th style="width: 25px">Coord.</th>
    {{-- <th style="width: 25px">Decan.</th> --}}
    <th style="width: 37px"></th>
</thead> 
<tr>
   <td>{{ $item->id }}</td>
   <td>{{ $item->programa_academico }}</td>
   <td>{{ $item->espacio_academico }}</td>
   <td>{{ $item->destino_rp }}</td>
   <td>{{ $item->fecha_salida_aprox_rp }}</td>
   <td>{{ $item->fecha_regreso_aprox_rp }}</td> 
   <td>{{ $item->ab_coor }}</td> 
   {{-- <td>{{ $item->ab_dec }}</td> --}}
   <td> 
       {{-- <a href="{{route('proyeccion_edit',$item->id)}}">
       <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
       </a>  --}}
   </td> 
</tr>
@endforeach 

</table>

{{-- <a href="{{route('proyeccion_send')}}"> --}}
    <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
{{-- </a>  --}}
</form>