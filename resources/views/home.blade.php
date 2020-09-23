<!-- HTML HEAD -->
@extends('layouts.app')
<!-- end HTML HEAD -->

@if(Auth::user()->inactivo())
  @section('contenido')
    <div class="container-fluid">
      <h6> Usuario Inactivo</h6>
      
  @endsection

@else
  @section('contenido')
  <div class="container-fluid">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>

    <form method="POST" action="{{ route('sendNot') }}">
      @csrf

      <button type="submit">Send</button>
    </form>

    <form method="POST" action="{{ route('apertura_proy') }}">
      @csrf

      <button type="submit">apertura_proy</button>
    </form>

    <form method="POST" action="{{ route('cierre_proy') }}">
      @csrf

      <button type="submit">cierre_proy</button>
    </form>

    <form method="POST" action="{{ route('apertura_solic') }}">
      @csrf

      <button type="submit">apertura_solic</button>
    </form>

    <form method="POST" action="{{ route('cierre_solic') }}">
      @csrf

      <button type="submit">cierre_solic</button>
    </form>

    <form method="POST" action="{{ route('creacion_proy', array('id'=>2)) }}">
      @csrf

      <button type="submit" style="background-color: chocolate">creacion_proy</button>
    </form>

    <form method="POST" action="{{ route('creacion_solic', array('id'=>2)) }}">
      @csrf

      <button type="submit">creacion_solic</button>
    </form>

    <form method="POST" action="{{ route('aprob_coord_proy') }}">
      @csrf

      <button type="submit">aprob_coord_proy</button>
    </form>

    <form method="POST" action="{{ route('aprob_coord_solic') }}">
      @csrf

      <button type="submit">aprob_coord_solic</button>
    </form>

    <form method="POST" action="{{ route('aprob_ejec_solic') }}">
      @csrf

      <button type="submit">aprob_ejec_solic</button>
    </form>

    <form method="POST" action="{{ route('radic_avance_tesor_solic') }}">
      @csrf

      <button type="submit">radic_avance_tesor_solic</button>
    </form>

    <form method="POST" action="{{ route('info_solic_estudiantes') }}">
      @csrf

      <button type="submit">info_solic_estudiantes</button>
    </form>

    <form method="POST" action="{{ route('info_transp_vice') }}">
      @csrf

      <button type="submit">info_transp_vice</button>
    </form>

    <form method="POST" action="{{ route('noti_transp_solic') }}">
      @csrf

      <button type="submit">noti_transp_solic</button>
    </form>

    <form method="POST" action="{{ route('pre_salida') }}">
      @csrf

      <button type="submit">pre_salida</button>
    </form>

    <form method="POST" action="{{ route('pos_salida') }}">
      @csrf

      <button type="submit">pos_salida</button>
    </form>

  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      {{-- <form method="POST" action="{{ route('import_plan_conting.img') }}"  enctype="multipart/form-data">
        @csrf
       
      <div class="row">
        <div class="form-group">
            <label for=""></label>
            <input type="file"  name="plan_contingencia" style="color: rgb(243, 3, 3)">
        </div>
        <div class="form-group">
          <button class="btn btn-success" name="import_proyecciones" title="Importar Archivo Excel"><i class="fas fa-file-import"></i>     CSV</button></a>
        </div>
      </div>

    </form> --}}
        {{-- <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <div class="form-group">
              <label for=""></label>
              <div class="row">
                <a href="{{route('proyeccion_preliminar.pdf')}}"><button class="btn btn-success" ><i class="fas fa-download"></i>     PDF</button></a>
              </div>
          </div>
        </div> --}}
  </div>
    {{-- <div>
        <button class="btn btn-success" name="import_users" href="{{route('enviar_correo') }}">Enviar</button></a>
    </div> --}}
    
  @endsection

@endif
