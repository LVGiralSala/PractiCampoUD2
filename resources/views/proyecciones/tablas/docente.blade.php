<thead>
     <th style="width: 35px">Cod.</th>
     {{-- <th style="width: 90px">Proy. Curricular</th>
     <th style="width: 95px">Esp. Académico</th> 
     <th style="width: 105px">Destino RP</th>
     <th style="width: 35px">Fecha Salida</th>
     <th style="width: 35px">Fecha Regreso</th>
     <th style="width: 25px">Coord.</th>
     <th style="width: 25px">Decan.</th> --}}
     <th style="width: 37px"></th>
</thead> 
{{-- @foreach ($proyecciones as $item)  --}}
<tr>
    <td>{{ $proyeccion_preliminar->id }}</td>
    {{-- <td>{{ $item->programa_academico }}</td>
    <td>{{ $item->espacio_academico }}</td>
    <td>{{ $item->destino_rp }}</td>
    <td>{{ $item->fecha_salida_aprox_rp }}</td>
    <td>{{ $item->fecha_regreso_aprox_rp }}</td> 
    <td>{{ $item->abrev }}</td> 
    <td>{{ $item->abrev }}</td>  --}}
    <td> 
        <a href="{{route('proyeccion_edit',$proyeccion_preliminar->id)}}">
        <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
        </a> 
    </td> 
</tr>
{{-- @endforeach --}}
{{-- @extends('proyecciones.edit')

@section('tb1') --}}
    {{-- <h5>prueba</h5> --}}
{{-- @endsection --}}