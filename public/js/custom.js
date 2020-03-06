// import { url } from "inspector";

/*Agregar campo*/
$(document).ready(function(){
    var maxField = 6;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var fieldHtml = '<div class="col-md-6" id="esp_aca"><div class="row"><div class="col-md-4" id="esp_aca"><label for="id_espacio_academico_1" class="col-form-label text-md-right">Cod. Académ.</label>'+
    '<span class="hs-form-required">*</span><input type="text" name="id_espacio_academico_[]" value="" class="form-control"/></div>'+
    '<div class="col-md-8" id="esp_aca"><label for="id_espacio_academico_1" class="col-form-label text-md-right">'+
    'Espacio Académico</label><span class="hs-form-required">*</span><div class="row">'+
    '<input type="text" name="espacio_academico" value="" class="form-control" style="width: 90%;"/><a href="#" class="remove_field"><img src="remove-icon.png"/></a></div></div></div>';

    // '<div><select name="id_espacio_academico_[]" id="add_espacio_academico" class="form-control" required>@foreach($espacios_academicos as $esp)<option value="{{$esp->id}}" selected>$esp->espacio_academico</option>@endforeach</select><a class="remove_field"><img src="remove-icon.png"/></a></div>';
    // var fieldHtml = $('#esp_aca .field_wrapper').last().clone();
    var x = 1;

    $(addButton).click(function(e){
        e.preventDefault();
        if(x < maxField)
        {
            x++;
            $(wrapper).append(fieldHtml);
        }
    });

    $(wrapper).on('click', '.remove_field', function(e){
        e.preventDefault();
        $(this).parent().parent().parent().remove();
        // $("#div_esp_aca, #div_esp_aca2").remove();
        // $("#div_esp_aca2").remove();
        x--;
    });
     
});


$(document).ready(function(){

    /*transporte ruta principal - rp*/
    var maxField_rp = 3;
    var addButton_rp = $('#add_transp_rp');
    var x_rp = 1;
    var nameFieldInput_rp = $('#transporte_rp_children').children().find('input[type=text]').attr('id');
    var lengthInput_rp = $('#transporte_rp_children').children().find('input[type=text]').attr('id').length;
    var shortNameInput_rp=nameFieldInput_rp.substr(0,lengthInput_rp-1);
    var nameFieldRadio_rp = $('#transporte_rp_children').children().find('input[type=radio]').attr('id');
    var lengthRadio_rp = $('#transporte_rp_children').children().find('input[type=radio]').attr('id').length;
    var shortNameRadio_rp=nameFieldRadio_rp.substr(0,lengthRadio_rp-1);
    var w_rp,y_rp,z_rp;
    var div_copy_rp;
    var classError_rp;
    /*transporte ruta principal - rp*/

    /*transporte ruta alterna - ra*/
    var maxField_ra = 3;
    var addButton_ra = $('#add_transp_ra');
    var x_ra = 1;
    var nameFieldInput_ra = $('#transporte_ra_children').children().find('input[type=text]').attr('id');
    var lengthInput_ra = $('#transporte_ra_children').children().find('input[type=text]').attr('id').length;
    var shortNameInput_ra=nameFieldInput_ra.substr(0,lengthInput_ra-1);
    var nameFieldRadio_ra = $('#transporte_ra_children').children().find('input[type=radio]').attr('id');
    var lengthRadio_ra = $('#transporte_ra_children').children().find('input[type=radio]').attr('id').length;
    var shortNameRadio_ra = nameFieldRadio_ra.substr(0,lengthRadio_ra-1);
    var w_ra,y_ra,z_ra;
    var div_copy_ra;
    var classError_ra;
    /*transporte ruta alterna - ra*/

    /*espacios acadeémicos - ea*/
    var maxField_ea = 6;
    var addButton_ea = $('#add_ea');
    var x_ea = 1;
    var nameFieldInput_ea = $('#esp_aca_children').children().find('input[type=text]').attr('id');
    // var lengthInput_ea = $('#esp_aca_children').children().find('input[type=text]').attr('id').length;
    // var shortNameInput_ea = nameFieldInput_ea.substr(0,lengthInput_ea-1);
    // var nameFieldRadio_ea = $('#esp_aca_children').children().find('input[type=radio]').attr('id');
    // var lengthRadio_ea = $('#esp_aca_children').children().find('input[type=radio]').attr('id').length;
    // var shortNameRadio_ea = nameFieldRadio_ea.substr(0,lengthRadio_ea-1);
    // var w_rp,y_ea,z_ea;
    // var div_copy_ea;
    // var classError_ea;
    /*espacios acadeémicos - ea*/

    /*transporte ruta principal - rp*/
    $(addButton_rp).click(function(e){
        e.preventDefault();

    
         if(x_rp < maxField_rp)
         {
             div_copy_rp = $('#transporte_rp_children').clone();
             div_copy_rp.children().find('span').remove();
             div_copy_rp.children().find('input[type=text]').removeAttr('required');
             div_copy_rp.children().find('a').attr('class','remove_field_rp');
             
             x_rp++;

             y_rp=shortNameInput_rp+x_rp;
             w_rp=shortNameRadio_rp+x_rp;
             classError_rp = "form-control @error('"+y_rp+"') is-invalid @enderror";
             
             div_copy_rp.children().find('input[type=radio]').attr('id', w_rp);
             div_copy_rp.children().find('input[type=radio]').attr('name', w_rp);
             div_copy_rp.children().find('input[type=text]').attr('class', "form-control");
             div_copy_rp.children().find('input[type=text]').val("");
            
            $("#transporte_rp").append(div_copy_rp);
            
         }
         
    });

    $('#transporte_rp').on('click', '.remove_field_rp', function(e){
        e.preventDefault();
       
        $(this).parent().parent().remove();
            x_rp--;
            y_rp=shortNameInput_rp+x_rp;
            w_rp=shortNameRadio_rp+x_rp;
            classError_rp = "form-control @error('"+y_rp+"') is-invalid @enderror";
            	
            div_copy_rp.children().find('input[type=radio]').attr('id', w_rp);
            div_copy_rp.children().find('input[type=radio]').attr('name', w_rp);
            div_copy_rp.children().find('input[type=text]').attr('class', "form-control");
            // div_copy_rp.children().find('input[type=text]').val("");
        
    });
    /*transporte ruta principal - rp*/

    /*transporte ruta alterna - ra*/
    $(addButton_ra).click(function(e){
        e.preventDefault();
        
         if(x_ra < maxField_ra)
         {
             div_copy_ra = $('#transporte_ra_children').clone();
             div_copy_ra.children().find('span').remove();
             div_copy_ra.children().find('input[type=text]').removeAttr('required');
             div_copy_ra.children().find('a').attr('id','remove_field_ra');
             div_copy_ra.children().find('a').attr('class','remove_field_ra');
             
             x_ra++;

             y_ra=shortNameInput_ra+x_ra;
             w_ra=shortNameRadio_ra+x_ra;
             classError_ra = "form-control @error('"+y_ra+"') is-invalid @enderror";
             
             div_copy_ra.children().find('input[type=radio]').attr('id', w_ra);
             div_copy_ra.children().find('input[type=radio]').attr('name', w_ra);
             div_copy_ra.children().find('input[type=text]').attr('class', "form-control");
             div_copy_ra.children().find('input[type=text]').val("");
            
            $("#transporte_ra").append(div_copy_ra);
            
         }
         
    });

    $('#transporte_ra').on('click', '.remove_field_ra', function(e){
        e.preventDefault();
       
        $(this).parent().parent().remove();
            x_ra--;
            y_ra=shortNameInput_ra+x_ra;
            w_ra=shortNameRadio_ra+x_ra;
            classError_ra = "form-control @error('"+y_ra+"') is-invalid @enderror";
            	
            div_copy_ra.children().find('input[type=radio]').attr('id', w_ra);
            div_copy_ra.children().find('input[type=radio]').attr('name', w_ra);
            div_copy_ra.children().find('input[type=text]').attr('class', "form-control");
            // div_copy_ra.children().find('input[type=text]').val("");
        
    });
    /*transporte ruta alterna - ra*/

    /*espacios acadeémicos - ea*/
    // $(addButton_ea).click(function(e){
    //     e.preventDefault();

        //  if(x_ea < maxField_ea)
        //  {
            //  div_copy_ea = $('#esp_aca_children').clone();
            //  div_copy_ea.children().find('span').remove();
            //  div_copy_ea.children().find('input[type=text]').removeAttr('required');
            //  div_copy_ea.children().find('a').attr('id','remove_field_ea');
            //  div_copy_ea.children().find('a').attr('class','remove_field_ea');
             
            //  x_ea++;

            //  y_ea=shortNameInput_ea+x_ea;
            //  w_ea=shortNameRadio_ea+x_ea;
            //  classError_ea = "form-control @error('"+y_ea+"') is-invalid @enderror";
             
            //  div_copy_ea.children().find('input[type=radio]').attr('id', w_ea);
            //  div_copy_ea.children().find('input[type=radio]').attr('name', w_ea);
            //  div_copy_ea.children().find('input[type=text]').attr('class', "form-control");
            //  div_copy_ea.children().find('input[type=text]').val("");
            
            // $('#esp_aca').append(div_copy_ea);
            
        //  }
         
    // });

    // $('#esp_aca').on('click', '.remove_field_ra', function(e){
    //     e.preventDefault();
       
    //     $(this).parent().parent().remove();
    //         x_ra--;
    //         y_ra=shortNameInput_ra+x_ra;
    //         w_ra=shortNameRadio_ra+x_ra;
    //         classError_ra = "form-control @error('"+y_ra+"') is-invalid @enderror";
            	
    //         div_copy_ra.children().find('input[type=radio]').attr('id', w_ra);
    //         div_copy_ra.children().find('input[type=radio]').attr('name', w_ra);
    //         div_copy_ra.children().find('input[type=text]').attr('class', "form-control");
            // div_copy_ra.children().find('input[type=text]').val("");
        
    // });
    /*espacios acadeémicos - ea*/

});

/*Buscar Espacio Académico*/
function searchEspaAca(id, indice){
    url = '/buscar/espa_aca';
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: url,
        type: 'POST',
        cache: false,
        data: {'id':id,'x':indice},                
        // beforeSend: function(xhr){
        // xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
        // },
        success:function(respu){
            console.log(respu);
            $("#espacio_academico_1"+indice).val(respu.espacio_academico);  

              if ( jQuery.isEmptyObject(respu)) {
                  $("#espacio_academico_1"+indice).val('El código no esta disponible');
                      $("#id_espacio_academico_1"+indice).val('');  
              }
                        
              },
            error: function(xhr, textStatus, thrownError) {
              
            }
        
    });
}










