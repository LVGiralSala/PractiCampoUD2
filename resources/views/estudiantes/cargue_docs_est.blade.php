@include('layouts.partials.htmlhead')
{{-- @include('layouts.partials.header1') --}}

{{-- @section('content') --}}
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Documentación Estudiante') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('import_doc_estudiante.img',[$estudiante->num_identificacion,$estudiante->cod_estudiantil]) }}"  enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group row">
                            <label for="seguro_estudiantil" class="col-md-3 col-form-label text-md-left">Seguro Estudiantil</label>
                            <div class="col-md-9">
                                <input type="file"  name="seguro_estudiantil" class="form-control" style="color: rgb(243, 3, 3)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="documento_adicional_1" class="col-md-3 col-form-label text-md-left">Documento 1</label>
                            <div class="col-md-9">
                                <input type="file"  name="documento_adicional_1" class="form-control" style="color: rgb(243, 3, 3)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle_documento_adicional_1" class="col-md-3 col-form-label text-md-left">Detalle Documento 1</label>
                            <div class="col-md-9">
                                <input type="text"  name="detalle_documento_adicional_1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="documento_adicional_2" class="col-md-3 col-form-label text-md-left">Documento 2</label>
                            <div class="col-md-9">
                                <input type="file"  name="documento_adicional_2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detalle_documento_adicional_2" class="col-md-3 col-form-label text-md-left">Detalle Documento 2</label>
                            <div class="col-md-9">
                                <input type="text"  name="detalle_documento_adicional_2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" name="import_proyecciones" title="Importar Archivo Excel"><i class="fas fa-file-import"></i>     SUBIR</button></a>
                        </div>
                
                        <div>
                            {{-- <input type="img"  name="plan_contingencia" style="color: rgb(243, 3, 3)" <php echo $imagen?>> --}}
                            {{-- <img src="{{$img}}" alt=""> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}

@include('layouts.partials.scripts')
