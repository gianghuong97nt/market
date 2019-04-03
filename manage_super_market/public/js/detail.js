'use strict';

$(document).ready(function () {
    initEvents();
});

function initEvents() {
    //add row project member
    $(document).on('click','#btn-add-row-1',function () {
        alert("abc");
        try {
            var row = $("#main_row_1 tbody tr:first").clone();
            $('#table-data-1 tbody').append(row);
        } catch (e) {
            alert('add new row' + e.message);
        }
    });

    $(document).on('click', '.btn-remove-row-1', function () {
        try {
            var len = $('#table-data-1 tbody tr').length;
            if(len > 1){
                $(this).closest('tr').remove();
            }
        } catch (e) {
            alert('remove row ' + e.message);
        }
    });

    //return list products

    $(document).on('click', '.row', function () {
        try {

        } catch (e) {
            alert('remove row ' + e.message);
        }
    });

}