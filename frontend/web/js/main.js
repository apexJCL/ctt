$(document).ready(function () {

    var info_template = '<span class="bg-info">%s</span>';

    if (flash_info != null) {
        flash_info.forEach(function (entry) {
            Materialize.toast(entry, 5000, 'blue');
        });
    }
});