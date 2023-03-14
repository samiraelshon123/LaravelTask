$("#submitForm").on("submit", function(e){
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var valid=validate('submitForm'); // validate required Fields
    if(!valid){ // return required message
        Swal.fire({position: 'top-center',icon: 'error',title: 'يرجي ادخال الحقول المطلوبة',showConfirmButton: false,timer: 2000});
        return '';
    }
    var form = $(this);
    var actionUrl = form.attr('action');
    $('.is-invalid').removeClass('.is-invalid');
    $('.control-hint.error').remove();
    $.ajax({
        url: actionUrl,
        method: 'POST',
        dataType: 'json',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        // data: form.serialize(),
        success: function(data){
            Swal.fire({position: 'top-center',icon: 'success',title: data.massage,showConfirmButton: false,timer: 2000});
           setTimeout(() => {
            window.location.href = data['path'];
           }, 500);
        },
        error: function (jqXhr, textStatus, errorMessage) { // error callback
            $('.text-danger').remove();
            if(jqXhr.responseJSON.errors){
                Swal.fire({position: 'top-center',icon: 'error',title: 'يرجي ادخال الحقول المطلوبة',showConfirmButton: false,timer: 2000});
            $.each(jqXhr.responseJSON.errors,function(field_name,error){
                $(document).find('[name='+field_name+']').addClass('is-invalid');
                $(document).find('[name='+field_name+']').after('<span class="invalid-feedback control-hint error" role="alert"><strong>' +error+ '</strong> </span>');
                // $(document).find('[name='+field_name+']').after('<small class="text-danger">' +error+ '</small>');
            })}
            else if(jqXhr.status==401){
                Swal.fire({position: 'top-center',icon: 'error',title: jqXhr.responseJSON.massage,showConfirmButton: false,timer: 2000});
                if (jqXhr.responseJSON.path){

                    setTimeout(() => {
                        window.location.href = jqXhr.responseJSON.path;
                    }, 500);
                }
            }
        }
      });
});




// Validation required fields
function validate(formId) {
    var v=true;
    $("#"+formId+" .req").each(function(){

        var valu=  $(this).val();
        if(!valu)
        {
            $(this).addClass('is-invalid');
            $(this).next().addClass('is-invalid');
            v= false;
        }else
            $(this).removeClass('is-invalid');
            $(this).next().removeClass('is-invalid');
    });
    return v;
}





// ajax request for all changeStatus Modules
function changeStatus(ele,id,url=null){ //get module url and current row Id
    let status = ($(ele).is( ":checked" )) ? 1 : 0; // get value of switch key
    url = (url === null)? window.location.pathname+'/status' : url; // check url update or status method
    $.ajax({
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        dataType: 'json',
        data: {id: id,status:status, _method:"PUT"},
        success: function(data){
            Swal.fire({position:'top-center',icon: 'success',title: data.massage,showConfirmButton: false,timer: 2000});
        },
        error: function (jqXhr, textStatus, errorMessage) { // error callback
            Swal.fire({position:'top-center',icon: 'error',title: jqXhr.responseJSON.massage ,showConfirmButton: false,timer: 2000});
        }
      });
}




// ajax request for all changeTheme Modules
function changetheme(url=null){ //get module url and current row Id

    var current = $('#theme_mode_change').attr('data-mode');
    var changeTo = '';
    var icon = '';


    switch (current) {
        case 'light-theme':
           $('#theme_mode_change i').removeClass('bx-sun');
           $('#theme_mode_change i').addClass('bx-tone');
           $('#theme_mode_change').attr('data-mode', 'semi-dark');
           changeTo = 'semi-dark';
           icon = 'tone';
           $("#semidark").click();
            break;
        case 'semi-dark':
           $('#theme_mode_change i').removeClass('bx-tone');
           $('#theme_mode_change i').addClass('bx-moon');
           $('#theme_mode_change').attr('data-mode', 'dark-theme');
           changeTo = 'dark-theme';
           icon = 'moon';
           $("#darkmode").click();
            break;
        default:
            $('#theme_mode_change i').removeClass('bx-moon');
            $('#theme_mode_change i').addClass('bx-sun');
            $('#theme_mode_change').attr('data-mode', 'light-theme');
            changeTo = 'light-theme';
            icon = 'sun';
            $("#lightmode").click();
            break;
    }

    url = (url === null)? window.location.pathname+'/status' : url; // check url update or status method
    $.ajax({
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'get',
        dataType: 'json',
        data: {changeTo:changeTo,icon:icon},
        // success: function(data){
        //     Swal.fire({position:'top-center',icon: 'success',title: data.massage,showConfirmButton: false,timer: 2000});
        // },
        // error: function (jqXhr, textStatus, errorMessage) { // error callback
        //     Swal.fire({position:'top-center',icon: 'error',title: jqXhr.responseJSON.massage ,showConfirmButton: false,timer: 2000});
        // }
      });
}

$(document).on('click','#toggle_sidebar_icon', function(){
    var url = $(this).attr('data-url');
    console.log(url);
    var changeTo = ($('#wrapper').hasClass('toggled')) ? 'toggled' : '';
    $.ajax({
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'get',
        dataType: 'json',
        data: {changeTo:changeTo},
      });
});

$(document).on("click", ".open-deleteDialog", function () {
    document.getElementById('deleteFormAction').action = $(this).attr('data-action');
});



