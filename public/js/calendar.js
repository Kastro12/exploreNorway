$(document).ready(function () {

    var today = new Date();

    $('#arrival, #departure').datepicker({
        dateFormat:'yy-mm-dd',
        minDate: today
    });

});