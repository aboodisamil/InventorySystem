$(document).ready(function () {

    $('#add').on('click', function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        var unit = $("input[name='unit']").val();
        alert(unit);
        $.ajax({
            type: 'POST',
            url: "{{ route('dashboard.unit.store') }}",
            data: {
                '_token': "{{ csrf_token()  }}",
                'unit': unit

            },
            success: function (data) {
                alert(data.success);
            }
        });

    });


});
