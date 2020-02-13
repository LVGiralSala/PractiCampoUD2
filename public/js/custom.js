import { url } from "inspector";

// Agregar campo
$(document).ready(function(){
    
    var maxField = 6;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var fieldHtml = '<br><input type="text" name="id_espacio_academico_[]" value="" class="form-control" style="width: 90%;margin-top:13px"/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a>';
    var x = 1;

    $(addButton).click(function(){
        if(x < maxField)
        {
            x++;
            $(wrapper).append(fieldHtml);
        }
    });

    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });
     
});

$("#num_via").onchange(
    function(){
        var num_via = document.getElementById("num_via").value;
        // var det_1_via = document.getElementById().value;
        // var det_2_via = document.getElementById().value;
        // var num_1_placa = document.getElementById().value;
        // var num_2_placa = document.getElementById().value;
        // var interior = document.getElementById().value;
        // var det_interior = document.getElementById().value;
    
    
        var dir_completa = num_via;
    
        document.getElementById("dirección_residencia").value = dir_completa;
       
});









