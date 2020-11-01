$(document).ready(function (e) {

    $('#exampleModal').on('show.bs.modal' , function (e)
    {

        var buuton = $(e.relatedTarget),
            phone= buuton.attr("data-phone"),
            supplier = buuton.attr("data-supplier"),
            category = buuton.attr("data-category"),
         contact_person = buuton.attr("data-contact-person");
        var modal = $(this);
        modal.find('.modal-body #supplier').text(supplier);

        modal.find('.modal-body #contact_person').text(contact_person);

        modal.find('.modal-body #phone').text(phone);
        modal.find('.modal-body #category_name').text(category);

    })


});