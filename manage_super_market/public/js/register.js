
'use strict';

$(document).ready(function () {
    alert(1);
    initEvents();
});

function initEvents() {
    //change_key
    $(document).on('click', '.register', function () {
        try {
            alert(1);
            var _this = $(this).closest('.register_data');
            Register(_this);
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

}

function Register(element) {
    try {
        var data = {};

        var _this = element;
        var username   = _this.find('#username').val();
        var email      = _this.find('#email').val();
        var password   = _this.find('#password').val();


        data.username = username;
        data.email    = email;
        data.password = password;
        alert(username);

        $.ajax({
            type: 'POST',
            url: '/register/addUsername',
            dataType: 'html',
            loading: true,
            data: data,

            success: function (res) {

            },
            // Ajax error
            error: function (res) {
            }

        });
    } catch (e) {
        alert('Register' + e.message);
    }

}

