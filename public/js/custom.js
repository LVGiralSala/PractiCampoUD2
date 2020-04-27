// import { url } from "inspector";

/*Agregar campo*/
// $(document).ready(function(){
//     var maxField = 6;
//     var addButton = $('.add_button');
//     var wrapper = $('.field_wrapper');
//     var fieldHtml = '<div class="col-md-6" id="esp_aca"><div class="row"><div class="col-md-4" id="esp_aca"><label for="id_espacio_academico_1" class="col-form-label text-md-right">Cod. Académ.</label>'+
//     '<span class="hs-form-required">*</span><input type="text" name="id_espacio_academico_[]" value="" class="form-control"/></div>'+
//     '<div class="col-md-8" id="esp_aca"><label for="id_espacio_academico_1" class="col-form-label text-md-right">'+
//     'Espacio Académico</label><span class="hs-form-required">*</span><div class="row">'+
//     '<input type="text" name="espacio_academico" value="" class="form-control" style="width: 90%;"/><a href="#" class="remove_field"><img src="remove-icon.png"/></a></div></div></div>';

//     // '<div><select name="id_espacio_academico_[]" id="add_espacio_academico" class="form-control" required>@foreach($espacios_academicos as $esp)<option value="{{$esp->id}}" selected>$esp->espacio_academico</option>@endforeach</select><a class="remove_field"><img src="remove-icon.png"/></a></div>';
//     // var fieldHtml = $('#esp_aca .field_wrapper').last().clone();
//     var x = 1;

//     $(addButton).click(function(e){
//         e.preventDefault();
//         if(x < maxField)
//         {
//             x++;
//             $(wrapper).append(fieldHtml);
//         }
//     });

//     $(wrapper).on('click', '.remove_field', function(e){
//         e.preventDefault();
//         $(this).parent().parent().parent().remove();
//         // $("#div_esp_aca, #div_esp_aca2").remove();
//         // $("#div_esp_aca2").remove();
//         x--;
//     });
     
// });


$(document).ready(function(){

    /*transporte ruta principal - rp Proyección*/
    var maxField_rp = 3;
    var addButton_rp = $('#add_transp_rp');
    var x_rp = 1;
    var nameFieldInput_rp = $('#transporte_rp_children').children().find('input[type=text]').attr('id');
    var nameFieldRadio_rp = $('#transporte_rp_children').children().find('input[type=radio]').attr('id');
    var lengthRadio_rp;
    var shortNameRadio_rp;
    var w_rp,y_rp,z_rp;
    var div_copy_rp;
    var classError_rp;
    /*transporte ruta principal - rp Proyección*/

    /*transporte ruta alterna - ra Proyección*/
    var maxField_ra = 3;
    var addButton_ra = $('#add_transp_ra');
    var x_ra = 1;
    var nameFieldInput_ra = $('#transporte_ra_children').children().find('input[type=text]').attr('id');
    var nameOtroTransp_ra = $('#transporte_ra_children').children().find('input[type=text]').attr('id');
    var nameFieldRadio_ra = $('#transporte_ra_children').children().find('input[type=radio]').attr('id');
    var lengthRadio_ra;
    var shortNameRadio_ra;
    var w_ra,y_ra,z_ra;
    var div_copy_ra;
    var classError_ra;
    /*transporte ruta alterna - ra Proyección*/

    /*transporte ruta principal - rp Edit Proyección*/
    var maxField_edit_rp = 3;
    var addButton_edit_rp = $('#add_transp_edit_rp');
    var x_edit_rp = 1;
    var nameFieldInput_edit_rp = $('#transporte_rp_children').children().find('input[type=text]').attr('id');
    var nameFieldRadio_edit_rp = $('#transporte_rp_children').children().find('input[type=radio]').attr('id');
    var lengthRadio_edit_rp;
    var shortNameRadio_edit_rp;
    var w_edit_rp,y_edit_rp,z_edit_rp;
    var div_copy_edit_rp;
    var classError_edit_rp;
    /*transporte ruta principal - rp Edit Proyección*/

    /*transporte ruta alterna - ra Edit Proyección*/
    var maxField_edit_ra = 3;
    var addButton_edit_ra = $('#add_transp_ra');
    var x_edit_ra = 1;
    var nameFieldInput_edit_ra = $('#transporte_ra_children').children().find('input[type=text]').attr('id');
    var nameOtroTransp_edit_ra = $('#transporte_ra_children').children().find('input[type=text]').attr('id');
    var nameFieldRadio_edit_ra = $('#transporte_ra_children').children().find('input[type=radio]').attr('id');
    var lengthRadio_edit_ra;
    var shortNameRadio_edit_ra;
    var w_edit_ra,y_edit_ra,z_edit_ra;
    var div_copy_edit_ra;
    var classError_edit_ra;
    /*transporte ruta alterna - ra Edit Proyección*/

    /*espacios acadeémicos - ea Proyección*/
    var maxField_ea = 6;
    var addButton_ea = $('#add_ea');
    var x_ea = 1;
    var nameFieldInput_ea = $('#esp_aca_children').children().find('input[type=text]').attr('id');
    var nameEaFieldInput_ea;
    var lengthInput_ea;
    var shortNameInput_ea;
    var nameFieldSelect_ea = $('#esp_aca_children').children().find('select').attr('id');
    var nameEaFieldSelect_ea;
    var lengthSelect_ea;
    var shortIdSelect_ea;
    var w_ea,y_ea,z_ea,p_ea;
    var div_copy_ea;
    var classError_ea;
    var lengthDiv_ea;
    
    /*espacios acadeémicos - ea Proyección*/

    /*transporte ruta principal - rp Proyección*/
    $(addButton_rp).click(function(e){
        e.preventDefault();
    
         if(x_rp < maxField_rp)
         {
             div_copy_rp = $('#transporte_rp_children').clone();
             div_copy_rp.children().find('span').remove();
             div_copy_rp.children().find('input[type=text]').removeAttr('required');
             div_copy_rp.children().find('a').attr('id','remove_field_rp');
             div_copy_rp.children().find('a').attr('class','remove_field_rp imgButton');
             div_copy_rp.children().find('a').attr('title','Remove field');
             div_copy_rp.children().find('img').attr('src','/img/remove-icon.png');
             
             x_rp++;

             nameOtroTransp_ra = div_copy_rp.children().find('input[type=text]').first().attr('id');
             lengthOtroTransp_ra = div_copy_rp.children().find('input[type=text]').first().attr('id').length;
             shortNameOtroTransp_ra = nameOtroTransp_ra.substr(0,lengthOtroTransp_ra-1);
             o_rp = shortNameOtroTransp_ra+x_rp;

             lengthRadio_rp = div_copy_rp.children().find('input[type=radio]').attr('id').length;
             shortNameRadio_rp = nameFieldRadio_rp.substr(0,lengthRadio_rp-1);
            //  y_rp=shortNameInput_rp+x_rp;
             w_rp=shortNameRadio_rp+x_rp;

            //  classError_rp = "form-control @error('"+y_rp+"') is-invalid @enderror";

            div_copy_rp.children().find('select').attr('onchange','otroTransporte(this.value,'+x_rp+')')

            // div_copy_rp.children().find('input[type=text]').first().attr('readonly', 'readonly');
            div_copy_rp.children().find('input[type=text]').first().attr('id', o_rp);
            div_copy_rp.children().find('input[type=text]').first().attr('name', o_rp);

             div_copy_rp.children().find('input[type=radio]').attr('id', w_rp);
             div_copy_rp.children().find('input[type=radio]').attr('name', w_rp);
            //  div_copy_rp.children().find('input[type=text]').attr('class', "form-control");
             div_copy_rp.children().find('input[type=text]').val("");
            
            $("#transporte_rp").append(div_copy_rp);
            
         }
         
    });

    $('#transporte_rp').on('click', '.remove_field_rp', function(e){
        e.preventDefault();
       
        $(this).parent().parent().parent().parent().remove();
            x_rp--;
            // y_rp=shortNameInput_rp+x_rp;
            w_rp=shortNameRadio_rp+x_rp;
            classError_rp = "form-control @error('"+y_rp+"') is-invalid @enderror";
            	
            div_copy_rp.children().find('input[type=radio]').attr('id', w_rp);
            div_copy_rp.children().find('input[type=radio]').attr('name', w_rp);
            // div_copy_rp.children().find('input[type=text]').attr('class', "form-control");
            // // div_copy_rp.children().find('input[type=text]').val("");
        
    });
    /*transporte ruta principal - rp Proyección*/

    /*transporte ruta alterna - ra Proyección*/
    $(addButton_ra).click(function(e){
        e.preventDefault();

         if(x_ra < maxField_ra)
         {
             div_copy_ra = $('#transporte_ra_children').clone();
             div_copy_ra.children().find('span').remove();
             div_copy_ra.children().find('input[type=text]').removeAttr('required');
             div_copy_ra.children().find('a').attr('id','remove_field_ra');
             div_copy_ra.children().find('a').attr('class','remove_field_ra imgButton');
             div_copy_ra.children().find('a').attr('title','Remove field');
             div_copy_ra.children().find('img').attr('src','/img/remove-icon.png');
             
             x_ra++;

             nameOtroTransp_ra = div_copy_ra.children().find('input[type=text]').first().attr('id');
             lengthOtroTransp_ra = div_copy_ra.children().find('input[type=text]').first().attr('id').length;
             shortNameOtroTransp_ra = nameOtroTransp_ra.substr(0,lengthOtroTransp_ra-1);
             o_ra = shortNameOtroTransp_ra+x_ra;

            lengthRadio_ra = div_copy_ra.children().find('input[type=radio]').attr('id').length;
            shortNameRadio_ra = nameFieldRadio_ra.substr(0,lengthRadio_ra-1);

            //  y_ra=shortNameInput_ra+x_ra;
             w_ra=shortNameRadio_ra+x_ra;
            //  classError_ra = "form-control @error('"+y_ra+"') is-invalid @enderror";

            div_copy_ra.children().find('select').attr('onchange','otroTransporte2(this.value,'+x_ra+')')

            // div_copy_ra.children().find('input[type=text]').first().attr('readonly', 'readonly');
            div_copy_ra.children().find('input[type=text]').first().attr('id', o_ra);
            div_copy_ra.children().find('input[type=text]').first().attr('name', o_ra);
             
             div_copy_ra.children().find('input[type=radio]').attr('id', w_ra);
             div_copy_ra.children().find('input[type=radio]').attr('name', w_ra);
            //  div_copy_ra.children().find('input[type=text]').attr('class', "form-control");
             div_copy_ra.children().find('input[type=text]').val("");
            
            $("#transporte_ra").append(div_copy_ra);
            
         }
         
    });

    $('#transporte_ra').on('click', '.remove_field_ra', function(e){
        e.preventDefault();
       
        $(this).parent().parent().parent().parent().remove();
            x_ra--;
            w_ra=shortNameRadio_ra+x_ra;
            // classError_ra = "form-control @error('"+y_ra+"') is-invalid @enderror";
            	
            div_copy_ra.children().find('input[type=radio]').attr('id', w_ra);
            div_copy_ra.children().find('input[type=radio]').attr('name', w_ra);
            // div_copy_ra.children().find('input[type=text]').attr('class', "form-control");
            // div_copy_ra.children().find('input[type=text]').val("");
        
    });
    /*transporte ruta alterna - ra Proyección*/
    $("#transp_rp_2").hide();
    $("#transp_rp_3").hide();
    /*transporte ruta alterna - ra edit Proyección*/
    $(addButton_edit_rp).click(function(e){
        e.preventDefault();

        $(this).show();

        //  if(x_edit_ra < maxField_edit_ra)
        //  {
        //      div_copy_edit_ra = $('#transporte_ra_children').clone();
        //      div_copy_edit_ra.children().find('span').remove();
        //      div_copy_edit_ra.children().find('input[type=text]').removeAttr('required');
        //      div_copy_edit_ra.children().find('a').attr('id','remove_field_ra');
        //      div_copy_edit_ra.children().find('a').attr('class','remove_field_edit_ra imgButton');
        //      div_copy_edit_ra.children().find('a').attr('title','Remove field');
        //      div_copy_edit_ra.children().find('img').attr('src','/img/remove-icon.png');
             
        //      x_edit_ra++;

        //      nameOtroTransp_edit_ra = div_copy_edit_ra.children().find('input[type=text]').first().attr('id');
        //      lengthOtroTransp_edit_ra = div_copy_edit_ra.children().find('input[type=text]').first().attr('id').length;
        //      shortNameOtroTransp_edit_ra = nameOtroTransp_edit_ra.substr(0,lengthOtroTransp_edit_ra-1);
        //      o_edit_ra = shortNameOtroTransp_edit_ra+x_edit_ra;

        //     lengthRadio_edit_ra = div_copy_edit_ra.children().find('input[type=radio]').attr('id').length;
        //     shortNameRadio_edit_ra = nameFieldRadio_edit_ra.substr(0,lengthRadio_edit_ra-1);

        //     //  y_edit_ra=shortNameInput_edit_ra+x_edit_ra;
        //      w_edit_ra=shortNameRadio_edit_ra+x_edit_ra;
        //     //  classError_edit_ra = "form-control @error('"+y_edit_ra+"') is-invalid @enderror";

        //     div_copy_edit_ra.children().find('select').attr('onchange','otroTransporte2(this.value,'+x_edit_ra+')')

        //     // div_copy_edit_ra.children().find('input[type=text]').first().attr('readonly', 'readonly');
        //     div_copy_edit_ra.children().find('input[type=text]').first().attr('id', o_edit_ra);
        //     div_copy_edit_ra.children().find('input[type=text]').first().attr('name', o_edit_ra);
             
        //      div_copy_edit_ra.children().find('input[type=radio]').attr('id', w_edit_ra);
        //      div_copy_edit_ra.children().find('input[type=radio]').attr('name', w_edit_ra);
        //     //  div_copy_edit_ra.children().find('input[type=text]').attr('class', "form-control");
        //      div_copy_edit_ra.children().find('input[type=text]').val("");
            
        //     $("#transporte_ra").append(div_copy_edit_ra);
            
        //  }
         
    });

    $('#transporte_ra').on('click', '.remove_field_ra', function(e){
        e.preventDefault();
       
        $(this).parent().parent().parent().parent().remove();
            x_ra--;
            w_ra=shortNameRadio_ra+x_ra;
            // classError_ra = "form-control @error('"+y_ra+"') is-invalid @enderror";
            	
            div_copy_ra.children().find('input[type=radio]').attr('id', w_ra);
            div_copy_ra.children().find('input[type=radio]').attr('name', w_ra);
            // div_copy_ra.children().find('input[type=text]').attr('class', "form-control");
            // div_copy_ra.children().find('input[type=text]').val("");
        
    });
    /*transporte ruta alterna - ra edit Proyección*/

    /*espacios acadeémicos - ea Proyección*/
    $(addButton_ea).click(function(e){
        e.preventDefault();

        lengthDiv_ea = $('#esp_aca').find('#esp_aca_children .row').toArray().length;
        // $('#esp_aca_children').find('input[type=text]').val(x_ea);
        x_ea = lengthDiv_ea;

         if(x_ea < maxField_ea)
         {
            div_copy_ea = $('#esp_aca_children').clone();
            // div_copy_ea.children().find('span').remove(); -->para usar el searchEspaAca_2
            div_copy_ea.children().find('input[type=text]').removeAttr('required');
            div_copy_ea.children().find('a').attr('id','remove_field_ea');
            div_copy_ea.children().find('a').attr('class','remove_field_ea imgButton');
            div_copy_ea.children().find('a').attr('title','Remove field');
            div_copy_ea.children().find('img').attr('src','/img/remove-icon.png');

            x_ea++;
            // lengthDiv_ea++;
            // div_copy_ea.children().find('input[type=text]').val(x_ea);
             
            nameEaFieldInput_ea = div_copy_ea.children().find('input[type=text]').attr('name');
            lengthInput_ea = div_copy_ea.children().find('input[type=text]').attr('name').length;
            shortNameInput_ea = nameEaFieldInput_ea.substr(0, lengthInput_ea-2);
            y_ea=shortNameInput_ea+x_ea;

            nameEa2FieldInput_ea = div_copy_ea.children().find('a').prev().attr('id');
            lengthInput_ea1 = div_copy_ea.children().find('a').prev().attr('id').length;
            shortNameInput_ea1 = nameEa2FieldInput_ea.substr(0, lengthInput_ea1-1);
            y_ea1=shortNameInput_ea1+x_ea;
            //  classError_ea = "form-control @error('"+y_ea+"') is-invalid @enderror";

            nameEaFieldSelect_ea = div_copy_ea.children().find('select').attr('id');
            lengthSelect_ea = div_copy_ea.children().find('select').attr('id').length;
            shortIdSelect_ea = nameEaFieldSelect_ea.substr(0,lengthSelect_ea-1);
            p_ea = shortIdSelect_ea+x_ea;

        //    var prueba = div_copy_ea.children().find('option:selected').val();
        //    var idSelect_ea = "#id_programa_academico_"+x_ea;

        //    var opt_ea = $(idSelect_ea).children().find('option:selected').val();

            //  div_copy_ea.children().find('input[type=text]').attr('class', "form-control");
            div_copy_ea.children().find('label').attr('id','id_espacio_academico_'+x_ea);
            div_copy_ea.children().find('select').attr('id', p_ea);
            div_copy_ea.children().find('select').attr('onchange','searchEspaAca_2('+x_ea+')');
            div_copy_ea.children().find('input[type=text]').attr('onchange','searchEspaAca(this.value,'+x_ea+')');
            div_copy_ea.children().find('a').prev().attr('id', y_ea1);
            div_copy_ea.children().find('a').prev().attr('name', y_ea1);
            
            div_copy_ea.children().find('input[type=text]').val("");
            div_copy_ea.children().find('a').prev().val("");
            
            $('#esp_aca').append(div_copy_ea);
            
         }
         
    });

    $('#esp_aca').on('click', '.remove_field_ea', function(e){
        e.preventDefault();
       
        $(this).parent().parent().parent().remove();
            x_ea--;
            
    //      classError_ra = "form-control @error('"+y_ra+"') is-invalid @enderror";

    //       div_copy_ra.children().find('input[type=text]').attr('class', "form-control");
            // div_copy_ra.children().find('input[type=text]').val("");
        
    });

    $(addButton_ea_edit).click(function(e){
        e.preventDefault();

        lengthDiv_ea = $('#esp_aca').find('#esp_aca_children .row').toArray().length;
        // $('#esp_aca_children').find('input[type=text]').val(x_ea);
        x_ea = lengthDiv_ea;

         if(x_ea < maxField_ea)
         {

               var f= $('#esp_aca_children_1');
               f.style.display = "Block";
        //     div_copy_ea = $('#esp_aca_children').clone();
        //     // div_copy_ea.children().find('span').remove(); -->para usar el searchEspaAca_2
        //     div_copy_ea.children().find('input[type=text]').removeAttr('required');
        //     div_copy_ea.children().find('a').attr('id','remove_field_ea_edit');
        //     div_copy_ea.children().find('a').attr('class','remove_field_ea_edit imgButton');
        //     div_copy_ea.children().find('a').attr('title','Remove field');
        //     div_copy_ea.children().find('img').attr('src','/img/remove-icon.png');

        //     x_ea++;
        //     // lengthDiv_ea++;
        //     // div_copy_ea.children().find('input[type=text]').val(x_ea);
             
        //     nameEaFieldInput_ea = div_copy_ea.children().find('input[type=text]').attr('name');
        //     lengthInput_ea = div_copy_ea.children().find('input[type=text]').attr('name').length;
        //     shortNameInput_ea = nameEaFieldInput_ea.substr(0, lengthInput_ea-2);
        //     y_ea=shortNameInput_ea+x_ea;

        //     nameEa2FieldInput_ea = div_copy_ea.children().find('a').prev().attr('id');
        //     lengthInput_ea1 = div_copy_ea.children().find('a').prev().attr('id').length;
        //     shortNameInput_ea1 = nameEa2FieldInput_ea.substr(0, lengthInput_ea1-1);
        //     y_ea1=shortNameInput_ea1+x_ea;
        //     //  classError_ea = "form-control @error('"+y_ea+"') is-invalid @enderror";

        //     nameEaFieldSelect_ea = div_copy_ea.children().find('select').attr('id');
        //     lengthSelect_ea = div_copy_ea.children().find('select').attr('id').length;
        //     shortIdSelect_ea = nameEaFieldSelect_ea.substr(0,lengthSelect_ea-1);
        //     p_ea = shortIdSelect_ea+x_ea;

        // //    var prueba = div_copy_ea.children().find('option:selected').val();
        // //    var idSelect_ea = "#id_programa_academico_"+x_ea;

        // //    var opt_ea = $(idSelect_ea).children().find('option:selected').val();

        //     //  div_copy_ea.children().find('input[type=text]').attr('class', "form-control");
        //     div_copy_ea.children().find('label').attr('id','id_espacio_academico_'+x_ea);
        //     div_copy_ea.children().find('select').attr('id', p_ea);
        //     div_copy_ea.children().find('select').attr('onchange','searchEspaAca_2('+x_ea+')');
        //     div_copy_ea.children().find('input[type=text]').attr('onchange','searchEspaAca(this.value,'+x_ea+')');
        //     div_copy_ea.children().find('a').prev().attr('id', y_ea1);
        //     div_copy_ea.children().find('a').prev().attr('name', y_ea1);
            
        //     div_copy_ea.children().find('input[type=text]').val("");
        //     div_copy_ea.children().find('a').prev().val("");
            
        //     $('#esp_aca').append(div_copy_ea);
            
         }
         
    });


    $('#esp_aca').on('click', '.remove_field_ea_edit', function(e){
        e.preventDefault();
       
        $(this).parent().parent().parent().remove();

            x_ea--;
            
    //      classError_ra = "form-control @error('"+y_ra+"') is-invalid @enderror";

    //       div_copy_ra.children().find('input[type=text]').attr('class', "form-control");
            // div_copy_ra.children().find('input[type=text]').val("");
        
    });
    /*espacios acadeémicos - ea Proyección*/

});

/*Buscar Espacio Académico Proyección*/
function searchEspaAca(id, indice){

    var idSelect_pa = "#id_programa_academico_"+indice;
    var idSelected_pa = $(idSelect_pa).find('option:selected').val();
    var idInput_ea = $(idSelect_pa).next().next().find('input[type=text]').val();
    

    // if((idInput_ea == null))
    // {
    //     $("#espacio_academico_"+indice).val("Casilla de código académico vacía");
    //     $("#cod_espacio_academico_"+indice).next().next('input:text').css("border-color", "red");
    // }
    
    // if(idInput_ea != "")
    // {
        id_pa = idSelected_pa;
        url = '/buscar/espa_aca';
        opc = 1;

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            type: 'POST',
            cache: false,
            data: {'id':id, 'x':indice, 'id_pa':id_pa, 'opc':opc},                
            // beforeSend: function(xhr){
            // xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
            // },
            success:function(respu){
                console.log(respu);
                var nameEa = "#espacio_academico_"+indice;
                // var prog_a = $("#").val();
                $("#espacio_academico_"+indice).val(respu.espacio_academico);  
                $("#espacio_academico_"+indice).css("border-color", "#d1d3e2");
                $("#cod_espacio_academico_"+indice).next().next('input:text').css("border-color", "#d1d3e2");

                if ( jQuery.isEmptyObject(respu) || respu == null) {
                    $("#espacio_academico_"+indice).val('Código no disponible para el programa seleccionado');
                    // $("#espacio_academico_"+indice).val('Código no esta disponible para el programa seleccionado');
                    // $("#espacio_academico_"+indice).css("border-color", "red");
                    $("#cod_espacio_academico_"+indice).next().next('input:text').css("border-color", "red");

                        //   $("#espacio_academico_"+indice).val(idInput_ea);  
                }
                            
                },
                error: function(xhr, textStatus, thrownError) {
                
                }
        });
       
    // }
}

function searchEspaAca_2(indice){

    var idSelect_pa = "id_programa_academico_"+indice;
    var idSelected_pa = $("#"+idSelect_pa).find('option:selected').val();
    // $("#id_espacio_academico_1").next().next().css("border-color", "green"); ---> solo pruebas
    var idInput_ea = $("#cod_espacio_academico_"+indice).next().next('input:text').val();
    // var xxxx = "es"+idInput_ea+"valor"; ---> solo pruebas
    // $("#espacio_academico_"+indice).css("border-color", "green"); ---> solo pruebas
    $("#espacio_academico_"+indice).val(idInput_ea+"prueba");

    url = '/buscar/espa_aca';
    opc = 2;

    if((idInput_ea == "") || (idInput_ea == null))
    {
        $("#espacio_academico_"+indice).val("Código Académico vacío");
        $("#cod_espacio_academico_"+indice).next().next('input:text').css("border-color", "red");
    }
    
    else{

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            type: 'POST',
            cache: false,
            data: {'id_ea':idInput_ea, 'x':indice, 'id_pa':idSelected_pa, 'opc':opc},                
            // beforeSend: function(xhr){
            // xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
            // },
            success:function(respu){
                console.log(respu);
                var nameEa = "#espacio_academico_"+indice;
            
                // $("#espacio_academico_"+indice).val(idInput_ea);  
                $("#espacio_academico_"+indice).val(respu.espacio_academico);  
                $("#espacio_academico_"+indice).css("border-color", "#d1d3e2");
                $("#cod_espacio_academico_"+indice).next().next('input:text').css("border-color", "#d1d3e2");

                if ( jQuery.isEmptyObject(respu) || respu == null) {
                    //   $("#espacio_academico_"+indice).val('El código '+id+' no esta disponible para el programa académico');
                    $("#espacio_academico_"+indice).val('Código no disponible para el programa seleccionado');
                    // $("#espacio_academico_"+indice).css("border-color", "red");

                        //   $("#espacio_academico_"+indice).val(idInput_ea);  
                }
                            
                },
                error: function(xhr, textStatus, thrownError) {
                
                }
            
        });
    }   
}

/*Buscar Espacio Académico Proyección*/

/*OtroTransporte Proyección*/
function otroTransporte(id, indice)
{
    if(id != 4)
    {
        $('#otro_transporte_rp_'+indice).attr('readonly', 'readonly');
        $('#otro_transporte_rp_'+indice).removeAttr('required');
    }

    else if(id==4)
    {
        $('#otro_transporte_rp_'+indice).attr('required', 'required');
        $('#otro_transporte_rp_'+indice).removeAttr('readonly');
    }
}

function otroTransporte2(id, indice)
{
    if(id != 4)
    {
        $('#otro_transporte_ra_'+indice).attr('readonly', 'readonly');
        $('#otro_transporte_ra_'+indice).removeAttr('required');
    }

    else if(id==4)
    {
        $('#otro_transporte_ra_'+indice).attr('required');
        $('#otro_transporte_ra_'+indice).removeAttr('readonly');
    }
}

/*OtroTransporte Proyección*/


/*Bloquear input number proyección*/
// $("#cant_grupos").keypress(function (e) {
//         e.preventDefault();
// });

$("#cant_grupos").keypress(function (e) {
    e.preventDefault();
}).keydown(function(e){
    if ( e.keyCode === 8 || e.keyCode === 46 ) {
        return false;
    }
});

$("#cant_grupos_edit").keypress(function (e) {
    e.preventDefault();
}).keydown(function(e){
    if ( e.keyCode === 8 || e.keyCode === 46 ) {
        return false;
    }
});

/*Bloquear input number proyección*/


/*Cantidad Grupos Proyección create*/
$("#Grupos").hide();
$("#gp_2").hide();
$("#gp_3").hide();
$("#gp_4").hide();





$("#cant_grupos").change('keypress', function () {
    val = $("#cant_grupos").val();
    
    if(val==1)
    {
        $("#Grupos").show();
        $("#gp_1").show();
        $("#gp_2").hide();
        $("#gp_3").hide();
        $("#gp_4").hide();
    }
    else if(val==2)
    {
        $("#gp_2").show();
        $("#gp_3").hide();
        $("#gp_4").hide();
    }
    else if(val==3)
    {
        $("#gp_2").show();
        $("#gp_3").show();
        $("#gp_4").hide();
    }
    else if(val==4)
    {
        $("#gp_2").show();
        $("#gp_3").show();
        $("#gp_4").show();
    }
});

/*Cantidad Grupos Proyección create*/

/*Cantidad Grupos Proyección Edit*/
// x = $("#cant_grupos_edit").val();
// x;
// // $("#grupo_1").val(x);
//     if(x==1)
//     {
//         $("#Grupos_edit").show();
//         $("#gp_1_edit").show();
//         $("#gp_2_edit").hide();
//         $("#gp_3_edit").hide();
//         $("#gp_4_edit").hide();
//     }
//     else if(x==2)
//     {
//         $("#Grupos_edit").show();
//         $("#gp_1_edit").show();
//         $("#gp_2_edit").show();
//         $("#gp_3_edit").hide();
//         $("#gp_4_edit").hide();
//     }
//     else if(x==3)
//     {
//         $("#Grupos_edit").show();
//         $("#gp_1_edit").show();
//         $("#gp_2_edit").show();
//         $("#gp_3_edit").show();
//         $("#gp_4_edit").hide();
//     }
//     else if(x==4)
//     {
//         $("#Grupos_edit").show();
//         $("#gp_1_edit").show();
//         $("#gp_2_edit").show();
//         $("#gp_3_edit").show();
//         $("#gp_4_edit").show();
//     }


//     $("#Grupos_edit").show();
//     $("#gp_2_edit").show();
//     $("#gp_3_edit").hide();
//     $("#gp_4_edit").hide();

//     o = 1;
//     $("#grupo_2").val(o);

    // oo=$("#cant_grupos_edit").val();
    // $("#grupo_2").val(oo);

// $("#cant_grupos_edit").change('keypress', function () {
//     val = $("#cant_grupos_edit").val();
    
//     if(val==1)
//     {
//         $("#Grupos_edit").show();
//         $("#grupo_2").val(val);
//         $("#gp_1_edit").show();
//         $("#gp_2_edit").hide();
//         $("#gp_3_edit").hide();
//         $("#gp_4_edit").hide();
//     }
//     else if(val==2)
//     {
//         $("#grupo_2").val(val);
//         $("#gp_2_edit").show();
//         $("#gp_3_edit").hide();
//         $("#gp_4_edit").hide();
//     }
//     else if(val==3)
//     {
//         $("#gp_2_edit").show();
//         $("#gp_3_edit").show();
//         $("#gp_4_edit").hide();
//     }
//     else if(val==4)
//     {
//         $("#gp_2_edit").show();
//         $("#gp_3_edit").show();
//         $("#gp_4_edit").show();
//     }
// });

/*Cantidad Grupos Proyección Edit*/


// $("#asd").tipsy();




