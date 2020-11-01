$(document).ready(function () {


    $('#exampleModal2').on('show.bs.modal' , function (e)
    {
        var button=$(e.relatedTarget);

        var name=button.attr('data-store-name'),
         address=button.attr('data-address'),
         rentaldate=button.attr('data-rental-date'),
         expiredate=button.attr('data-rental-expire-date'),
         salary=button.attr('data-rental-salary'),
            category=button.attr('data-category');
         modal=$(this);

        modal.find('.modal-body #store_name').text(name);
        modal.find('.modal-body #address').text(address);
        modal.find('.modal-body #rental_date').text(rentaldate);
        modal.find('.modal-body #rental_expire_date').text(expiredate);
        modal.find('.modal-body #rental_salary').text(salary);
        modal.find('.modal-body #store_category').text(category)


    })
});