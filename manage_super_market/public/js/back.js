$(document).ready(function () {
    $(document).on('click', '#back', function () {
        try {
            back();
        } catch (e) {
            alert('logout row ' + e.message);
        }
    });
});

function back() {
    try {
        location.href = '/list/insert';
    } catch (e) {
        alert('save' + e.message);
    }
}