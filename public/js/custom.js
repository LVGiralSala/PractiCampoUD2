
// Agregar campo
$(document).ready(function(){
    var maxField = 6;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var fieldHtml = '<br><input type="text" name="field_name[]" value="" class="form-control" style="width: 90%;margin-top:13px"/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a>';
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
    })
});
