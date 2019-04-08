$(document).ready(function () {
    $(document).on('click', '#logout', function () {
        try {
            logout();
        } catch (e) {
            alert('remove row ' + e.message);
        }
    });
});

function logout() {
    try {

        $.ajax({
            type: 'GET',
            url: '/home/logout',
            dataType: 'json',
            loading: true,
        });
    } catch (e) {
        alert('save' + e.message);
    }
}