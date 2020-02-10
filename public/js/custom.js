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

// function filterUser(value)
// {
//     switch(value)
//     {
//         case '3':
//             url = 'users';
//             break;
//         case '2':
//             url = 'users/filtrar/inac';
//             break;
//         case '1':
//             url = 'users/filtrar/act';
//             break;
//         default:
//     }
//     window.location = url;
// }

// document.getElementById("estado").onclick = function()
// {
//     filterUser();
// }






