$("#addresstype").change(function() {
    if ($(this).val() == "house") {
        $('#apartmentFields').hide();
        $('#homeFields').show();
        $('#house').attr('required', '');
        $('#house').attr('data-error', 'This field is required.');
    } else {
        $('#homeFields').hide();
        $('#house').removeAttr('required');
        $('#house').removeAttr('data-error');
        $('#apartmentFields').show();
        $('#building').attr('required', '');
        $('#building').attr('data-error', 'This field is required.');
        $('#floor').attr('required', '');
        $('#floor').attr('data-error', 'This field is required.');
        $('#apartment').attr('required', '');
        $('#apartment').attr('data-error', 'This field is required.');
    }
});
$("#addresstype").trigger("change");