$(document).ready(function () {

    var today = new Date();

    $('#arrivalA, #departureA').datepicker({
        dateFormat:'yy-mm-dd',
        minDate: today
    });

});