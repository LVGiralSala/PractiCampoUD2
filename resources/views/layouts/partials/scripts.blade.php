<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" type="text/javascript"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}" type="text/javascript"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}" type="text/javascript"></script>

<!-- Page level demo scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}" type="text/javascript"></script>

<!-- datepicker scripts -->
<script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>

<!-- mask scripts -->
{{-- <script src="{{ asset('js/jquery.mask.js') }}"></script> --}}

<!-- custom scripts -->
<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tipsy/1.0.3/jquery.tipsy.min.js"></script>



<!-- functions-->


<script>

$(document).ready(function() {
    $('.datetimepicker').datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
    });
    $('.datetimepicker').datepicker(
        'setDate', new Date()
    );
});


function filterUser(value)
{
    switch(value)
    {
        case '3':
            href = "{!! route('users_filter','all'); !!}";
            break;
        case '2':
            href = "{!! route('users_filter','inac'); !!}";
            break;
        case '1':
            href = "{!! route('users_filter','act'); !!}";
            break;
        default:
    }
    window.location.href = href;
}

$('input:radio[name="id_estado_usuario"]').change(
    function(){
        filterUser(this.value);
       
});

function obtenerUsuario()
{
    var correo = document.getElementById("email").value;
    var correo_analizado = /^([^]+)@(\w+).(\w+).(\w+)$/.exec(correo);
    var [,nombre,servidor,dominio] = correo_analizado;

    document.getElementById("usuario").value = nombre;
}

function direccionCompleta()
{
    // var tipo_via_1 = document.getElementById("id_tipo_via_1").selectedOptions[0].value;
    // var tipo_via_1_str = tipo_via_1.options[tipo_via_1.selectedIndex].value;
    var num_via = document.getElementById("num_via").value;
    // var det_1_via = document.getElementById().value;
    // var det_2_via = document.getElementById().value;
    var num_1_placa = document.getElementById("num_placa_1").value;
    // var num_2_placa = document.getElementById().value;
    // var interior = document.getElementById().value;
    // var det_interior = document.getElementById().value;


    var dir_completa = num_via + " " + num_1_placa;

    document.getElementById("direccion_residencia").value = dir_completa;
}



</script>


