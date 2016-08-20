var parentElement = $('#authitem-name');
var AuthItemSpan = document.getElementById('authitem-type').dataset;

var ajaxGetChildren = function () {
    return $.ajax({
        url: '/ajax/autocomplete',
        type: 'GET',
        data: {
            parent: parentElement.val(),
            type: AuthItemSpan.type
        },
        dataType: 'JSON',
        success: function (data) {
            $('input.form-control').autocomplete({
                data: data
            });
        },
        error: function (data) {
            Materialize.toast('Ocurrió un error', 5000, 'red');
            console.debug(data);
        }
    });
}

$('.multiple-input').on('afterAddRow', function (e) {
    ajaxGetChildren();
});