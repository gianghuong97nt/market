$(document).ready(function () {
    $(document).on('click', '#logout', function () {
        try {
            logout();
        } catch (e) {
            alert('logout row ' + e.message);
        }
    });
});

function logout() {
    try {
        location.href = '/login';
    } catch (e) {
        alert('save' + e.message);
    }
}