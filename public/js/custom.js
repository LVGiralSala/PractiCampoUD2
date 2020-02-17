// import { url } from "inspector";

// Agregar campo
// $(document).ready(function(){
    
//     var maxField = 6;
//     var addButton = $('.add_button');
//     var wrapper = $('.field_wrapper');
//     var fieldHtml = '<br><input type="text" name="id_espacio_academico_[]" value="" class="form-control" style="width: 90%;margin-top:13px"/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a>';
//     var x = 1;

//     $(addButton).click(function(){
//         if(x < maxField)
//         {
//             x++;
//             $(wrapper).append(fieldHtml);
//         }
//     });

//     $(wrapper).on('click', '.remove_button', function(e){
//         e.preventDefault();
//         $(this).parent('div').remove();
//         x--;
//     });
     
// });

// function completarDireccion(id, idInput){
//     url = 'register/dirCompleta';
//     $.ajax({
//         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//         url: url,
//         type: 'POST',
//         cache: false,
//         data: {'id':id, 'idInput':idInput},                
//         // beforeSend: function(xhr){
//         // xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
//         // },
//         success:function(respu){
//             console.log(respu);
//             $("#direccion_residencia").val(respu.tipo);  

//               if ( jQuery.isEmptyObject(respu)) {
//                   $("#direccion_residencia").val("Dirección errónea");
//                     //   $("#id_codigo_CIIU").val('');  
//               }
                        
//               },
//             error: function(xhr, textStatus, thrownError) {
              
//             }
        
//     });
// }

// function completarDireccion(id, idvia)
// {
// var tipo_via = id;
// // var tipo_via = document.getElementById("id_tipo_via_1").value;
//    var num_via = idvia;
//    var comp_via = $("#id_complemento_via").val();
//    var pref_comp_via = $("#id_prefijo_compl_via").select().value;
//    var num_placa_1 = $("#num_placa_1").val();
//    var num_placa_2 = $("#num_placa_2").val();
//    var tipo_resid = $("#id_tipo_residencia").val();
//    var dat_adicion = $("#datos_adicionales").val();

// //    dirCompleta.val(num_via);

// //    $(direccion_residencia).val(dirCompleta);

//    url = 'register/dirCompleta';
//     $.ajax({
//         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//         url: url,
//         type: 'POST',
//         cache: false,
//         async: false,
//         // data: { 'id_tipo_via_1':id,}, 
//         data: { 'id_tipo_via_1':tipo_via, 
//                 'num_via':num_via,
//                 'id_complemento_via':comp_via,
//                 'id_prefijo_compl_via':pref_comp_via,
//                 'num_placa_1':num_placa_1,
//                 'num_placa_2':num_placa_2,
//                 'id_tipo_residencia':tipo_resid,
//                 'datos_adicionales':dat_adicion,},                
//         // beforeSend: function(xhr){
//         // xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
//         // },
//         success:function(respu){
//             console.log(respu);
//             $("#direccion_residencia").val(respu.tipo);  

//               if ( jQuery.isEmptyObject(respu)) {
//                   $("#direccion_residencia").val("Dirección errónea");
//                     //   $("#id_codigo_CIIU").val('');  
//               }
                        
//               },
//             error: function(xhr, textStatus, thrownError) {
              
//             }
        
//     });
// }











