$(document).ready(function ()
{
    $('#stores').on('change', function () {

        var $stores = $('select.stores').children("option:selected").val();


        $.get('{{ url("dashboard/getCategories"}}', function (res) {
            var $template = $.trim(res);
            var $category = $template.replace(/{{id}}/ig, $val);
            $res = $($category);
            $.each($locations, function (key, item) {
                if ($stores === item.storeId) {
                    $res.find('select.locations').append($('<option></option>').attr('value', item.id).text(item.name));
                }
            });
            $('.products-table tbody').prepend($res);
        });

    });


})