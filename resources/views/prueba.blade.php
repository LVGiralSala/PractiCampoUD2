<!-- HTML HEAD -->
@extends('layouts.app')
<!-- end HTML HEAD -->


    @section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Editar Usuario') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ url('users') }}">
                            @method('PUT')
                            @csrf
		<div class="form-group row">
			<div class="col-md-2">
				<label for="id_espacio_academico_1" class="col-form-label text-md-right">{{ __('Cod. Académ.') }}</label>
				<span class="hs-form-required">*</span>
				<div class="field_wrapper" style="display:flex; flex-wrap:wrap">
					<input type="text" name="id_espacio_academico_1" id="id_espacio_academico_" value="" class="form-control" style="width: 90%;"
					onblur="searchEspaAca(this.value)">
					{{-- <a href="{{URL::action('Otros\EspacioAcademicoController@searchEspaAca',$usuario->id_espacio_academico_1)}}" title="Add field"><img src="add-icon.png"/></a> --}}
				</div>
			</div>
			<div class="col-md-4">
				<label for="espacio_academico_1" class="col-form-label text-md-right">{{ __('Espacio Académico') }}</label>
				<span class="hs-form-required">*</span>
				<div class="field_wrapper" style="display:flex; flex-wrap:wrap">
					<input type="text" name="espacio_academico_1" id="espacio_academico_" class="form-control" style="width: 90%;"/>
					{{-- <a class="add_button" title="Add field"><img src="add-icon.png"/></a> --}}
				</div>
			</div>
		</div>
	</form>
</div>
</div>
<br>
</div>
</div>

@endsection 