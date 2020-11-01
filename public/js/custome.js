function init_validator() {
    $('form.validate').validate({
        // errorPlacement: function(error, element) {
        //     error.appendTo('#errordiv');
        // },

        errorElement: 'div',
        errorClass: 'invalid-feedback',
        lang: 'ar',
        invalidHandler: function (event, validator) { //display error alert on form submit
        },
        highlight: function (element) { // hightlight error inputs
            $(element).addClass('is-invalid'); // set error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).removeClass('is-invalid'); // set error class to the control group
        },
    });
    return;
}

$(document).ready(function () {

    init_validator();

    var count = 1;

    dynamic_field(count);

    function dynamic_field(number) {
        html = '<tr>';
        html += '<td><input  data-section="13" type="text" name="section[]" class="form-control" /></td>';
        html += '<td><input type="text" name="subsection[]" class="form-control" /></td>';
        html += '<td><input type="text" name="shelf[]" class="form-control" /></td>';
        if (number > 1) {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove"><i class="fa fa-trash"></i></button></td></tr>';
            $('#tbody').append(html);
        } else {
            html += '<td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></td></tr>';
            $('#tbody').html(html);
        }
    }

    $(document).on('click', '#add', function () {
        count++;
        dynamic_field(count);
    });
    $(document).on('click', '.remove', function () {
        count--;
        $(this).closest("tr").remove();
    });

    //
    // $('#save').on('click', function(event){
    //     event.preventDefault();
    //
    //     var form = new FormData($('#dynamic_form')[0]);
    //     // $.ajax({
    //     //     url: "{{ route('dashboard.location.store') }}",
    //     //     method:'POST',
    //     //     data:form,
    //     //     beforeSend:function(){
    //     //         $('#save').attr('disabled','disabled');
    //     //     },
    //     //     // success:function(data)
    //     //     // {
    //     //     //     if(data.error)
    //     //     //     {
    //     //     //         var error_html = '';
    //     //     //         for(var count = 0; count < data.error.length; count++)
    //     //     //         {
    //     //     //             error_html += '<p>'+data.error[count]+'</p>';
    //     //     //         }
    //     //     //       // $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
    //     //     //     }
    //     //     //     else
    //     //     //     {
    //     //     //         dynamic_field(1);
    //     //     //       //  $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
    //     //     //     }
    //     //     //     $('#save').attr('disabled', false);
    //     //     // }
    //     // })
    // });
    // var dataId = $('#dynamic_form').attr("section");
    // alert(dataId)

});
