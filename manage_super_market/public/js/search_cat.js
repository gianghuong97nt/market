
'use strict';

$(document).ready(function () {
    initEvents();
});

function initEvents() {
    //change_key
    $(document).on('click', '.pagination-location li a', function () {
        try {
            var page = $(this).attr('page');
            Search(page);
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

}

function Search(page) {
    try {
        var data = {};
        data.page = page;

        $.ajax({
            type: 'GET',
            url: '/category/load',
            dataType: 'html',
            loading: true,
            data: data,

            success: function (res) {
                $("#body_data").empty();
                $("#body_data").html(res);
            },
            // Ajax error
            error: function (res) {
            }

        });
    } catch (e) {
        alert('pagination' + e.message);
    }

}

