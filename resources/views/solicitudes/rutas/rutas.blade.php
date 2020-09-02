<table class="table table-bordered table-condensed table-hover table-sm header_table" cellspacing="0">
    <thead>
        <th style="width: 30px">Tipo Ruta</th>
        <th style="width: 90px">Proy. Curricular</th>
        <th style="width: 95px">Esp. Académico</th> 
        <th style="width: 105px">Destino Ruta Principal</th>
        <th style="width: 35px">Fecha Salida</th>
        <th style="width: 35px">Fecha Regreso</th>
        <th style="width: 37px"></th>
    </thead> 
    @foreach ($rutas as $item) 
    <tr>
    <td><?php if($item->tipo_ruta)?>{{ $item->tipo_ruta }}</td>
       <td>{{ $item->programa_academico }}</td>
       <td>{{ $item->espacio_academico }}</td>
       <td>{{ $item->destino }}</td>
       <td>{{ $item->fecha_salida }}</td>
       <td>{{ $item->fecha_regreso }}</td> 
       <td> 
           
           <a href="{{route('solicitud_edit',[$proyeccion_preliminar->id,$item->tipo_ruta])}}">
           <button class="btn-success" style="background-color: #447161; border:0">Editar</button>
           </a> 
       </td> 
    </tr>
    @endforeach 
</table>