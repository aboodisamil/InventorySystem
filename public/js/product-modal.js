$(document).ready(function () {
    $('#exampleModal3').on('show.bs.modal', function (e) {

        var button = $(e.relatedTarget);

        var product_name = button.attr('data-product-name'),
            num_of_box = button.attr('data-num-of-box'),
            num_of_package_in_box = button.attr('data-num-of-package-in-box'),
            num_of_piece_in_package = button.attr('data-num-of-piece-in-package'),
            manufacturer = button.attr('data-manufacturer'),
            price_by_piece = button.attr('data-price-by-piece'),
            price_by_quantity = button.attr('data-price-by-quantity');


        var modal = $(this);

        modal.find('.modal-body #product_name').text(product_name);
        modal.find('.modal-body #num_of_box').text(num_of_box);
        modal.find('.modal-body #num_of_package_in_box').text(num_of_package_in_box);
        modal.find('.modal-body #num_of_piece_in_package').text(num_of_piece_in_package);
        modal.find('.modal-body #manufacturer').text(manufacturer);
        modal.find('.modal-body #salary_by_quantity').text(price_by_quantity);
        modal.find('.modal-body #salary_by_piece').text(price_by_piece);

    });


});